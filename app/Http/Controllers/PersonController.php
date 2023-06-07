<?php

namespace App\Http\Controllers;

use App\SwapiResources\PersonResource;
use App\SwapiResources\StarshipResource;

class PersonController extends Controller
{
    /**
     * Return a list of the starships related to Luke Skywalker
     */
    public function lukeSkywalker()
    {
        $luke = (new PersonResource())->findByName('Luke Skywalker');
        if (empty($luke)) {
            return response()->json(['message' => 'Could not find person'], 400);
        }

        // Build a collection of starship names related to Luke
        $starshipResource = new StarshipResource();
        $starships = collect($luke->starships)->map(function (string $starshipUrl) use ($starshipResource) {
                return $starshipResource->findByUrl($starshipUrl)?->name;
        })
            ->filter()
            ->unique()
            ->sort()
            ->values();

        return response()->json(['starships' => $starships->toArray()]);
    }
}
