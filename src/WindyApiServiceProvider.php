<?php

namespace Benoit VRIGNAUD\WindyApi;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Benoit VRIGNAUD\WindyApi\Commands\WindyApiCommand;

class WindyApiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('windy-api')
            ->hasConfigFile();
    }
}
