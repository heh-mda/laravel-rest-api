<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Item;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ItemTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        //Миграция для таблицы с версиями моделей
        $this->artisan('migrate', [
            '--path' => 'vendor/venturecraft/revisionable/src/migrations',
        ]);
    }

    public function testUserCanSeeItems()
    {
        $item = factory(Item::class)->create();

        $this->get('/items')
        ->assertStatus(200)
        ->assertSee($item->name)
        ->assertSee($item->key);
    }
}
