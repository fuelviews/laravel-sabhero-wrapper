<?php

/**
 * Laravel SabHero Wrapper Configuration
 *
 * This file contains all configuration options for the SabHero wrapper package.
 * Configure these settings to customize which features are enabled in your application.
 */

return [
    /**
     * Livewire Integration
     *
     * When enabled, includes Livewire styles and scripts in the layout.
     * Requires livewire/livewire package to be installed.
     */
    'livewire_enabled' => env('SABHERO_LIVEWIRE_ENABLED', true),

    /**
     * Navigation Integration
     *
     * When enabled, includes the navigation component from fuelviews/laravel-navigation.
     * Requires fuelviews/laravel-navigation package to be installed.
     */
    'navigation_enabled' => env('SABHERO_NAVIGATION_ENABLED', true),

    /**
     * Footer Integration
     *
     * When enabled, includes the footer component from fuelviews/laravel-navigation.
     * Requires fuelviews/laravel-navigation package to be installed.
     */
    'footer_enabled' => env('SABHERO_FOOTER_ENABLED', true),

    /**
     * Forms Modal Integration
     *
     * When enabled, includes the forms modal component from fuelviews/laravel-forms.
     * Requires fuelviews/laravel-forms package to be installed.
     */
    'forms_modal_enabled' => env('SABHERO_FORMS_MODAL_ENABLED', true),

    /**
     * Google Tag Manager Integration
     *
     * When enabled, includes Google Tag Manager scripts and tracking.
     * Requires proper GTM configuration to be set up.
     */
    'gtm_enabled' => env('SABHERO_GTM_ENABLED', false),
];
