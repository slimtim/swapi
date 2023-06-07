<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Http;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        $this->setupHttpFakes();
        // Make sure all external HTTP requests are faked
        Http::preventStrayRequests();
    }

    /**
     * Create mock responses to all external HTTP requests
     */
    protected function setupHttpFakes()
    {
        Http::fake([
            'https://swapi.dev/api/planets/' => Http::response(
                file_get_contents(base_path('tests/Fixtures/Swapi/People/All.json'))
            ),
            'https://swapi.dev/api/planets/?page=2' => Http::response(
                file_get_contents(base_path('tests/Fixtures/Swapi/People/AllPage2.json'))
            ),
            'https://swapi.dev/api/people/?search=Luke+Skywalker' => Http::response(
                file_get_contents(base_path('tests/Fixtures/Swapi/People/AllSearchLukeSkywalker.json'))
            ),
            'https://swapi.dev/api/people/?search=Foobar' => Http::response(
                file_get_contents(base_path('tests/Fixtures/Swapi/People/AllSearchFoobar.json'))
            ),
            'https://swapi.dev/api/starships/*/' => Http::response(
                file_get_contents(base_path('tests/Fixtures/Swapi/Starships/AnySingle.json'))
            ),
            'https://swapi.dev/api/films/' => Http::response(
                file_get_contents(base_path('tests/Fixtures/Swapi/Films/All.json'))
            ),
            'https://swapi.dev/api/films/1/' => Http::response(
                file_get_contents(base_path('tests/Fixtures/Swapi/Films/Id1.json'))
            ),
            'https://swapi.dev/api/species/' => Http::response(
                file_get_contents(base_path('tests/Fixtures/Swapi/Species/All.json'))
            ),
            'https://swapi.dev/api/species/?page=2' => Http::response(
                file_get_contents(base_path('tests/Fixtures/Swapi/Species/AllPage2.json'))
            ),
            'https://swapi.dev/api/species/?page=3' => Http::response(
                file_get_contents(base_path('tests/Fixtures/Swapi/Species/AllPage3.json'))
            ),
        ]);
    }
}
