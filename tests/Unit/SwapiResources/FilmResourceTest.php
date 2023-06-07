<?php

namespace Tests\Unit\SwapiResources;

use App\SwapiResources\FilmResource;
use Tests\TestCase;

class FilmResourceTest extends TestCase
{
    public function test_that_find_by_episode_number_returns_one(): void
    {
        $film = (new FilmResource())->findByEpisodeNumber(1);

        $this->assertIsObject($film);
        $this->assertObjectHasProperty('title', $film);
    }

    public function test_that_find_by_episode_number_returns_none(): void
    {
        $film = (new FilmResource())->findByEpisodeNumber(9999);

        $this->assertNull($film);
    }

    public function test_that_all_method_returns_many(): void
    {
        $films = (new FilmResource())->all();

        $this->assertGreaterThan(1, count($films));
    }

    public function test_that_find_method_returns_one(): void
    {
        $film = (new FilmResource())->find(1);

        $this->assertIsObject($film);
        $this->assertObjectHasProperty('title', $film);
    }

    public function test_that_find_by_url_returns_one(): void
    {
        $film = (new FilmResource())->findByUrl('https://swapi.dev/api/films/1/');

        $this->assertIsObject($film);
        $this->assertObjectHasProperty('title', $film);
    }
}
