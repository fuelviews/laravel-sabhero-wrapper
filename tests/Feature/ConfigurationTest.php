<?php

namespace Fuelviews\SabHeroWrapper\Tests\Feature;

use Fuelviews\SabHeroWrapper\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ConfigurationTest extends TestCase
{
    #[Test]
    public function it_loads_default_configuration_values(): void
    {
        $this->assertTrue(config('sabhero-wrapper.livewire_enabled'));
        $this->assertTrue(config('sabhero-wrapper.navigation_enabled'));
        $this->assertTrue(config('sabhero-wrapper.footer_enabled'));
        $this->assertTrue(config('sabhero-wrapper.forms_modal_enabled'));
        $this->assertFalse(config('sabhero-wrapper.gtm_enabled'));
    }

    #[Test]
    public function it_can_override_configuration_via_environment(): void
    {
        // Set environment variables
        config(['sabhero-wrapper.livewire_enabled' => false]);
        config(['sabhero-wrapper.gtm_enabled' => true]);

        $this->assertFalse(config('sabhero-wrapper.livewire_enabled'));
        $this->assertTrue(config('sabhero-wrapper.gtm_enabled'));
    }

    #[Test]
    public function configuration_keys_exist(): void
    {
        $config = config('sabhero-wrapper');

        $expectedKeys = [
            'livewire_enabled',
            'navigation_enabled',
            'footer_enabled',
            'forms_modal_enabled',
            'gtm_enabled',
        ];

        foreach ($expectedKeys as $key) {
            $this->assertArrayHasKey($key, $config, "Configuration key '{$key}' is missing");
        }
    }

    #[Test]
    public function all_configuration_values_are_booleans(): void
    {
        $config = config('sabhero-wrapper');

        foreach ($config as $key => $value) {
            $this->assertIsBool($value, "Configuration value for '{$key}' should be a boolean");
        }
    }
}