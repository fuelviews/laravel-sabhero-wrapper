<?php

namespace Fuelviews\SabHeroWrapper;

use Fuelviews\SabHeroWrapper\Models\Page;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
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

    public function bootingPackage(): void
    {
        $this->publishes([
            __DIR__.'/../database/seeders/PageTableSeeder.php' => database_path('seeders/PageTableSeeder.php'),
        ], 'sabhero-wrapper-seeders');

        View::composer('sabhero-wrapper::components.layouts.app', function ($view) {
            $routeName = Route::currentRouteName();

            $seoPage = Page::where('slug', $routeName)
                ->first();

            $view->with('seoPage', $seoPage);
        });
    }
}
