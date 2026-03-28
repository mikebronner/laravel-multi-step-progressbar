<?php

namespace GeneaLabs\LaravelMultiStepProgressbar\Tests;

use GeneaLabs\LaravelMultiStepProgressbar\Providers\Service;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            Service::class,
        ];
    }
}
