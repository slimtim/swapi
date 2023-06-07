<?php

namespace App\Http\Controllers;

use App\SwapiResources\PlanetResource;
use stdClass;

class PlanetController extends Controller
{
    /**
     * Return the total population of all planets in the Galaxy
     */
    public function galaxy()
    {
        $planets = (new PlanetResource())->all();

        $population = collect($planets)->reduce(function (int $carry, stdClass $planet) {
            // Population may be non-numeric (i.e. 'unknown')
            return $carry + (is_numeric($planet->population) ? (int) $planet->population : 0);
        }, 0);

        return response()->json(['population' => $population]);
    }
}
