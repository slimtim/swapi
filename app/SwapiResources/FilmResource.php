<?php

namespace App\SwapiResources;

use stdClass;

class FilmResource extends Resource
{
    protected string $urlListAll = '/films';

    protected string $urlListOne = '/films/%d';

    /**
     * Return the film resource for the specified episode number
     *
     * @param int $episodeNumber
     * @return stdClass|null Film resource, or null if not found
     */
    public function findByEpisodeNumber(int $episodeNumber): ?stdClass
    {
        $films = $this->all();

        // Find the film with the specified episode number, or null if not found
        return collect($films)->first(function (stdClass $film) use ($episodeNumber) {
            return $film->episode_id === $episodeNumber;
        });
    }
}
