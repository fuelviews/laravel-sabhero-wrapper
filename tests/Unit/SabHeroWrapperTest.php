<?php

namespace Fuelviews\SabHeroWrapper\Tests\Unit;

use Fuelviews\SabHeroWrapper\SabHeroWrapper;
use Fuelviews\SabHeroWrapper\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class SabHeroWrapperTest extends TestCase
{
    private SabHeroWrapper $sabHeroWrapper;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->sabHeroWrapper = new SabHeroWrapper;
    }

    #[Test]
    public function it_returns_package_version(): void
    {
        $version = $this->sabHeroWrapper->version();
        
        $this->assertIsString($version);
        $this->assertEquals('1.0.0', $version);
    }

    #[Test]
    public function it_checks_if_feature_is_enabled(): void
    {
        config(['sabhero-wrapper.navigation_enabled' => true]);
        
        $this->assertTrue($this->sabHeroWrapper->isFeatureEnabled('navigation_enabled'));
        
        config(['sabhero-wrapper.navigation_enabled' => false]);
        
        $this->assertFalse($this->sabHeroWrapper->isFeatureEnabled('navigation_enabled'));
    }

    #[Test]
    public function it_returns_false_for_non_existent_feature(): void
    {
        $this->assertFalse($this->sabHeroWrapper->isFeatureEnabled('non_existent_feature'));
    }

    #[Test]
    public function it_gets_all_enabled_features(): void
    {
        config([
            'sabhero-wrapper.livewire_enabled' => true,
            'sabhero-wrapper.navigation_enabled' => true,
            'sabhero-wrapper.footer_enabled' => false,
            'sabhero-wrapper.forms_modal_enabled' => true,
            'sabhero-wrapper.gtm_enabled' => false,
        ]);
        
        $enabledFeatures = $this->sabHeroWrapper->getEnabledFeatures();
        
        $this->assertIsArray($enabledFeatures);
        $this->assertArrayHasKey('livewire_enabled', $enabledFeatures);
        $this->assertArrayHasKey('navigation_enabled', $enabledFeatures);
        $this->assertArrayHasKey('forms_modal_enabled', $enabledFeatures);
        $this->assertArrayNotHasKey('footer_enabled', $enabledFeatures);
        $this->assertArrayNotHasKey('gtm_enabled', $enabledFeatures);
        
        $this->assertTrue($enabledFeatures['livewire_enabled']);
        $this->assertTrue($enabledFeatures['navigation_enabled']);
        $this->assertTrue($enabledFeatures['forms_modal_enabled']);
    }

    #[Test]
    public function it_returns_empty_array_when_no_features_enabled(): void
    {
        config([
            'sabhero-wrapper.livewire_enabled' => false,
            'sabhero-wrapper.navigation_enabled' => false,
            'sabhero-wrapper.footer_enabled' => false,
            'sabhero-wrapper.forms_modal_enabled' => false,
            'sabhero-wrapper.gtm_enabled' => false,
        ]);
        
        $enabledFeatures = $this->sabHeroWrapper->getEnabledFeatures();
        
        $this->assertEmpty($enabledFeatures);
    }

    #[Test]
    public function it_handles_empty_config(): void
    {
        config(['sabhero-wrapper' => []]);
        
        $enabledFeatures = $this->sabHeroWrapper->getEnabledFeatures();
        
        $this->assertEmpty($enabledFeatures);
    }
}
