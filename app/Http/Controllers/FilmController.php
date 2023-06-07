<?php

namespace App\Http\Controllers;

use App\SwapiResources\FilmResource;
use App\SwapiResources\SpeciesResource;
use stdClass;

class FilmController extends Controller
{
    /**
     * Return the classification of all species in the 1st episode
     */
    public function episode1()
    {
        $ep1Film = (new FilmResource())->findByEpisodeNumber(1);
        if (empty($ep1Film)) {
            return response()->json(['message' => 'Could not find film'], 400);
        }

        $ep1SpeciesUrls = $ep1Film->species;
        $allSpecies = (new SpeciesResource())->all();

        // Build a collection of the specifies in episode 1
        $ep1Species = collect($allSpecies)->filter(function (stdClass $species) use ($ep1SpeciesUrls) {
            return in_array($species->url, $ep1SpeciesUrls);
        });

        // Build a collection of species classifications
        $ep1SpeciesClassification = $ep1Species->map(function (stdClass $species) {
            return $species->classification;
        })
            ->unique()
            ->sort()
            ->values();

        return response()->json(['classifications' => $ep1SpeciesClassification->toArray()]);
    }
}
