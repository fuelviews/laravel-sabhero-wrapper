<?php

namespace Fuelviews\SabHeroWrapper\Tests\Unit;

use Fuelviews\SabHeroWrapper\SabHeroWrapper;
use Fuelviews\SabHeroWrapper\SabHeroWrapperServiceProvider;
use Fuelviews\SabHeroWrapper\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class SabHeroWrapperServiceProviderTest extends TestCase
{
    #[Test]
    public function it_registers_the_service_provider(): void
    {
        $this->assertInstanceOf(
            SabHeroWrapperServiceProvider::class,
            $this->app->getProvider(SabHeroWrapperServiceProvider::class)
        );
    }

    #[Test]
    public function it_binds_sabhero_wrapper_to_container(): void
    {
        $instance = $this->app->make('sabhero-wrapper');
        
        $this->assertInstanceOf(SabHeroWrapper::class, $instance);
    }

    #[Test]
    public function it_binds_sabhero_wrapper_as_singleton(): void
    {
        $instance1 = $this->app->make('sabhero-wrapper');
        $instance2 = $this->app->make('sabhero-wrapper');
        
        $this->assertSame($instance1, $instance2);
    }

    #[Test]
    public function it_publishes_configuration_file(): void
    {
        $configPath = __DIR__ . '/../../config/sabhero-wrapper.php';
        
        $this->assertFileExists($configPath);
        
        $config = include $configPath;
        
        $this->assertIsArray($config);
        $this->assertArrayHasKey('livewire_enabled', $config);
        $this->assertArrayHasKey('navigation_enabled', $config);
        $this->assertArrayHasKey('footer_enabled', $config);
        $this->assertArrayHasKey('forms_modal_enabled', $config);
        $this->assertArrayHasKey('gtm_enabled', $config);
    }

    #[Test]
    public function it_loads_views(): void
    {
        $this->assertTrue(
            view()->exists('sabhero-wrapper::components.layouts.app')
        );
    }

    #[Test]
    public function it_provides_migrations(): void
    {
        $migrationPath = __DIR__ . '/../../database/migrations/create_pages_table.php';
        
        $this->assertFileExists($migrationPath);
    }
}