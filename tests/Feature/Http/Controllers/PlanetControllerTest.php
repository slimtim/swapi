<?php

namespace Http\Controllers;

use Tests\TestCase;

class PlanetControllerTest extends TestCase
{
    public function test_it_returns_a_successful_response(): void
    {
        $response = $this->getJson('/api/planets/galaxy');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'population'
            ]);
    }
}
