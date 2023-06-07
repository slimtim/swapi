<?php

namespace App\SwapiResources;

class StarshipResource extends Resource
{
    protected string $urlListAll = '/starships';

    protected string $urlListOne = '/starships/%d';
}
