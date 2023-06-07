<?php

namespace SwapiResources;

use App\SwapiResources\FilmResource;
use App\SwapiResources\PersonResource;
use Tests\TestCase;

class PersonResourceTest extends TestCase
{
    public function test_that_find_by_name_finds_one(): void
    {
        $person = (new PersonResource())->findByName('Luke Skywalker');

        $this->assertIsObject($person);
        $this->assertObjectHasProperty('name', $person);
    }

    public function test_that_find_by_name_finds_none(): void
    {
        $person = (new PersonResource())->findByName('Foobar');

        $this->assertNull($person);
    }
}
