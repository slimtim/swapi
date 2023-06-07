<?php

namespace Tests\Feature\Http\Controllers;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ControllerTest extends TestCase
{
    public function test_it_with_an_invalid_url(): void
    {
        $response = $this->postJson('/api/people/spock');

        $response->assertStatus(404);
    }
}
