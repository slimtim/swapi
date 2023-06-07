<?php

namespace App\SwapiResources;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Http;
use stdClass;

abstract class Resource
{
    /**
     * @const string Base URL for swapi
     */
    const BASE_URL = 'https://swapi.dev/api';

    /**
     * @var string URL segment of the swapi endpoint that lists all of a given resource
     */
    protected string $urlListAll = '';

    /**
     * @var string URL segment of the swapi endpoint that lists one of a given resource
     */
    protected string $urlListOne = '';


    /**
     * Returns the full URL of the swapi endpoint that lists all of a given resource
     *
     * @return string
     */
    protected function getUrlListAll(): string
    {
        return static::BASE_URL . $this->urlListAll . '/';
    }

    /**
     * Returns the full URL of the swapi endpoint that lists one a given resource
     *
     * @param int $id Resource id
     * @return string
     */
    protected function getUrlListOne(int $id): string
    {
        return static::BASE_URL . sprintf($this->urlListOne, $id) . '/';
    }

    /**
     * @param string $url
     * @return array|stdClass|null
     * @throws ClientException If the response contains a 400/500 level status code
     */
    protected function getResourcesFromEndpoint(string $url): array|stdClass|null
    {
        $response = Http::get($url);

        return $response->ok() ? $response->object() : null;
    }

    /**
     * Get all resources, following all pagination URLs, beginning with the specified URL
     *
     * @param string $url Starting resource URL
     * @return stdClass[]
     */
    public function all(string $url = ''): array
    {
        $url = $url ?: $this->getUrlListAll();
        $data = $this->getResourcesFromEndpoint($url);

        // Recursively fetch all resources
        return empty($data->next) ?
            $data->results :
            array_merge($data->results, $this->all($data->next));
    }

    /**
     * Find the single resource with the specified id
     *
     * @param int $id Resource id
     * @return stdClass|null
     */
    public function find(int $id): ?stdClass
    {
        $url = $this->getUrlListOne($id);
        return $this->getResourcesFromEndpoint($url);
    }

    /**
     * Find a single resource using the specified URL
     *
     * @param string $url URL of the resource
     * @return stdClass|null
     */
    public function findByUrl(string $url): ?stdClass
    {
        return $this->getResourcesFromEndpoint($url);
    }
}
