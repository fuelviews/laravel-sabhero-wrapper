<?php

namespace Fuelviews\SabHeroWrapper\Tests\Unit\Facades;

use Fuelviews\SabHeroWrapper\Facades\SabHeroWrapper as SabHeroWrapperFacade;
use Fuelviews\SabHeroWrapper\SabHeroWrapper;
use Fuelviews\SabHeroWrapper\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class SabHeroWrapperFacadeTest extends TestCase
{
    #[Test]
    public function it_resolves_facade_to_correct_instance(): void
    {
        $instance = SabHeroWrapperFacade::getFacadeRoot();
        
        $this->assertInstanceOf(SabHeroWrapper::class, $instance);
    }

    #[Test]
    public function it_calls_version_through_facade(): void
    {
        $version = SabHeroWrapperFacade::version();
        
        $this->assertEquals('1.0.0', $version);
    }

    #[Test]
    public function it_calls_is_feature_enabled_through_facade(): void
    {
        config(['sabhero-wrapper.navigation_enabled' => true]);
        
        $result = SabHeroWrapperFacade::isFeatureEnabled('navigation_enabled');
        
        $this->assertTrue($result);
    }

    #[Test]
    public function it_calls_get_enabled_features_through_facade(): void
    {
        config([
            'sabhero-wrapper.livewire_enabled' => true,
            'sabhero-wrapper.navigation_enabled' => false,
        ]);
        
        $enabledFeatures = SabHeroWrapperFacade::getEnabledFeatures();
        
        $this->assertIsArray($enabledFeatures);
        $this->assertArrayHasKey('livewire_enabled', $enabledFeatures);
        $this->assertArrayNotHasKey('navigation_enabled', $enabledFeatures);
    }
}
