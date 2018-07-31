<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Token;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Item;

class ItemTest extends TestCase
{
    use DatabaseMigrations;

    protected $headers = null;

    public function setUp()
    {
        parent::setUp();

        //Миграция для БД с версиями моделей
        $this->artisan('migrate', [
            '--path' => 'vendor/venturecraft/revisionable/src/migrations',
        ]);

        //Токен требуется везде. Так что лучше записать его в свойство.
        $token = new Token();
        $token = $token->generate();

        $this->headers = ['Authorization' => $token];
    }

    public function testItemsAreCreatedCorrectly()
    { 
        $payload = [
            'name' => 'Lorem',
            'key' => 'Ipsum',
        ];

        $this->json('POST', '/api/items', $payload, $this->headers)
        ->assertStatus(201)
        ->assertJson(['id' => 1, 'name' => 'Lorem', 'key' => 'Ipsum']);
    }

    public function testItemsAreReadedCorrectly()
    {
        $item = factory(Item::class)->create([
            'name' => 'Lorem',
            'key' => 'Ipsum',
        ]);

        $this->json('GET', '/api/items/' . $item->id, [], $this->headers)
        ->assertStatus(200)
        ->assertJson(['id' => 1, 'name' => 'Lorem', 'key' => 'Ipsum'])
        ->assertJsonStructure(['id', 'name', 'key', 'created_at', 'updated_at']);
    }

    public function testItemsAreListedCorrectly()
    {
        factory(Item::class)->create([
            'name' => 'First Name',
            'key' => 'firstkey',
        ]);

        factory(Item::class)->create([
            'name' => 'Second Name',
            'key' => 'secondkey',
        ]);

        $this->json('GET', '/api/items/', [], $this->headers)
        ->assertStatus(200)
        ->assertJson([
            ['id' => 1, 'name' => 'First Name', 'key' => 'firstkey'],
            ['id' => 2, 'name' => 'Second Name', 'key' => 'secondkey']
        ])
        ->assertJsonStructure([
            '*' => ['id', 'name', 'key', 'created_at', 'updated_at']
        ]);
    }

    public function testItemsAreUpdatedCorrectly()
    {
        $item = factory(Item::class)->create();

        $payload = [
            'name' => 'Lorem',
            'key' => 'Ipsum',
        ];

        $this->json('PUT', '/api/items/' . $item->id, $payload, $this->headers)
        ->assertStatus(200)
        ->assertJson(['id' => 1, 'name' => 'Lorem', 'key' => 'Ipsum']);
    }

    public function testItemsAreDeletedCorrectly()
    {
        $item = factory(Item::class)->create();

        $this->json('DELETE', '/api/items/' . $item->id, [], $this->headers)
        ->assertStatus(204);
    }
}
