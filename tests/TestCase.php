<?php


namespace Kenyalang\TaxReliefCalculator\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Kenyalang\TaxReliefCalculator\TaxReliefCalculatorServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            TaxReliefCalculatorServiceProvider::class
        ];
    }
}