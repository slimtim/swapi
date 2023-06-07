<?php

namespace Http\Controllers;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PersonControllerTest extends TestCase
{
    public function test_it_returns_a_successful_response(): void
    {
        $response = $this->getJson('/api/people/luke-skywalker');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'starships'
            ]);
    }
}
