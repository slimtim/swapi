<?php

namespace App\SwapiResources;

use Illuminate\Support\Facades\Http;
use stdClass;

class PersonResource extends Resource
{
    protected string $urlListAll = '/people';

    protected string $urlListOne = '/people/%d';

    /**
     * Return the first person resource matching the specified name
     *
     * @param string $name Person name search term
     * @return stdClass|null Person matching the specified name, or null if not found
     */
    public function findByName(string $name): ?stdClass
    {
        $url = $this->getUrlListAll() . '?' . http_build_query(['search' => $name]);
        $data = $this->getResourcesFromEndpoint($url);

        return $data->results[0] ?? null;
    }
}
