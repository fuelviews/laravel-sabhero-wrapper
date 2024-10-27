<?php

namespace Fuelviews\AppWrapper;

use Fuelviews\AppWrapper\Models\Page;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AppWrapperServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('app-wrapper')
            ->hasConfigFile('app-wrapper')
            ->hasViews()
            ->hasMigration('create_pages_table')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations();
            });

        $this->publishes([
            __DIR__.'/../database/seeders/PagesTableSeeder.php' => database_path('seeders/PagesTableSeeder.php'),
        ], 'app-wrapper-seeders');

        $this->publishes([
            __DIR__.'/../resources/views/welcome.blade.php' => resource_path('views/welcome.blade.php'),
        ], 'app-wrapper-welcome');
    }

    public function bootingPackage(): void
    {
        View::composer('app-wrapper::components.layouts.app', function ($view) {
            $routeName = Route::currentRouteName();

            $page = Page::where('slug', $routeName)
                ->first();

            $view->with('page', $page);
        });
    }
}
