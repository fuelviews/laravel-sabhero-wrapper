<?php

namespace Fuelviews\SabHeroWrapper;

/**
 * Class SabHeroWrapper
 *
 * Main service class for the SabHero wrapper package.
 * Provides core functionality for managing layouts and configurations.
 */
class SabHeroWrapper
{
    /**
     * Get the package version.
     */
    public function version(): string
    {
        return '1.0.0';
    }

    /**
     * Check if a feature is enabled in the configuration.
     */
    public function isFeatureEnabled(string $feature): bool
    {
        return config("sabhero-wrapper.{$feature}", false);
    }

    /**
     * Get all enabled features.
     */
    public function getEnabledFeatures(): array
    {
        $config = config('sabhero-wrapper', []);

        return array_filter($config, function ($value, $key) {
            return str_ends_with($key, '_enabled') && $value === true;
        }, ARRAY_FILTER_USE_BOTH);
    }
}
