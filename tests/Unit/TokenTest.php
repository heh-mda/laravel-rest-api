<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Token;

class TokenTest extends TestCase
{
    use DatabaseMigrations;

    public function testTokensAreCreatedCorrectly()
    {
        $this->json('POST', '/api/token', [], [])
        ->assertStatus(201);
    }
    
    public function testRequestWithoutToken()
    {
        $this->call('GET', '/api/items')->assertStatus(401);
    }

    public function testRequestWithToken()
    {
        $token = new Token();
        $token = $token->generate();

        $headers = ['Authorization' => $token];

        $this->json('GET', '/api/items', [], $headers)->assertStatus(200);
    }
}
