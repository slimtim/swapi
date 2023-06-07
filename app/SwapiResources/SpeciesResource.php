<?php

namespace App\SwapiResources;

class SpeciesResource extends Resource
{
    protected string $urlListAll = '/species';

    protected string $urlListOne = '/species/%d';
}
