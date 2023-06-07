<?php

namespace App\SwapiResources;

class PlanetResource extends Resource
{
    protected string $urlListAll = '/planets';

    protected string $urlListOne = '/planets/%d';
}
