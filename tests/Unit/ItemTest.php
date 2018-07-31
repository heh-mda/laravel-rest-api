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

    public function testItemsAreCreatedCorrectly()
    { 
        $token = new Token();
        $token = $token->generate();

        $headers = ['Authorization' => $token];

        $payload = [
            'name' => 'Lorem',
            'key' => 'Ipsum',
        ];

        $this->json('POST', '/api/items', $payload, $headers)
        ->assertStatus(201)
        ->assertJson(['id' => 1, 'name' => 'Lorem', 'key' => 'Ipsum']);
    }

    public function testItemsAreReadedCorrectly()
    {
        $token = new Token();
        $token = $token->generate();

        $headers = ['Authorization' => $token];

        $item = factory(Item::class)->create([
            'name' => 'Lorem',
            'key' => 'Ipsum',
        ]);

        $this->json('GET', '/api/items/' . $item->id, [], $headers)
        ->assertStatus(200)
        ->assertJson(['id' => 1, 'name' => 'Lorem', 'key' => 'Ipsum'])
        ->assertJsonStructure(['id', 'name', 'key', 'created_at', 'updated_at']);
    }

    public function testItemsAreUpdatedCorrectly()
    {
        $token = new Token();
        $token = $token->generate();

        $headers = ['Authorization' => $token];

        $item = factory(Item::class)->create();

        $payload = [
            'name' => 'Lorem',
            'key' => 'Ipsum',
        ];

        $this->json('PUT', '/api/items/' . $item->id, $payload, $headers)
        ->assertStatus(200)
        ->assertJson(['id' => 1, 'name' => 'Lorem', 'key' => 'Ipsum']);
    }

    public function testItemsAreDeletedCorrectly()
    {
        $token = new Token();
        $token = $token->generate();

        $headers = ['Authorization' => $token];

        $item = factory(Item::class)->create();

        $this->json('DELETE', '/api/items/' . $item->id, [], $headers)
        ->assertStatus(204);
    }
}
