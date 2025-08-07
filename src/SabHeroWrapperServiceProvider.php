<?php

namespace Fuelviews\SabHeroWrapper;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SabHeroWrapperServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('sabhero-wrapper')
            ->hasConfigFile('sabhero-wrapper')
            ->hasViews()
            ->hasMigration('create_pages_table')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations();
            });
    }
}
