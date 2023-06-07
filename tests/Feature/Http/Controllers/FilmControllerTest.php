<?php

namespace Tests\Feature\Http\Controllers;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FilmControllerTest extends TestCase
{
    public function test_it_returns_a_successful_response(): void
    {
        $response = $this->getJson('/api/films/episode-1');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'classifications'
            ]);
    }

    public function test_it_returns_an_unsupported_http_method_code(): void
    {
        // Endpoint should only respond to a GET
        $response = $this->postJson('/api/films/episode-1');

        $response->assertStatus(405);
    }
}
