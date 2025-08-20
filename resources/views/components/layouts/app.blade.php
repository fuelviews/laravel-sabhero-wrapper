<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (class_exists(RalphJSmit\Laravel\SEO\SEOManager::class))
        {!! seo($page ?? $seoPage ?? $seoPost ?? null) !!}
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if (class_exists(\Livewire\Livewire::class) && config('sabhero-wrapper.livewire_enabled'))
        @livewireStyles
    @endif

    @if(class_exists(\Spatie\GoogleFonts\GoogleFonts::class))
        @googlefonts
    @endif

    @if (View::exists('googletagmanager::head') && config('sabhero-wrapper.gtm_enabled'))
        @include('googletagmanager::head')
    @endif

    @if (class_exists(\Spatie\GoogleTagManager\GoogleTagManager::class) && config('sabhero-wrapper.gtm_enabled'))
        @include('googletagmanager::head')
    @endif
</head>
<body>
@if (class_exists(\Fuelviews\Navigation\Navigation::class) && config('sabhero-wrapper.navigation_enabled'))
    @component('navigation::components.navigation')
    @endcomponent
@endif

{{ $slot }}

@if (class_exists(\Fuelviews\Navigation\Components\Footer\Footer::class) && config('sabhero-wrapper.footer_enabled'))
    @component('navigation::components.footer.footer')
    @endcomponent
@endif

@if (class_exists(\Fuelviews\Forms\Forms::class) && config('sabhero-wrapper.forms_modal_enabled'))
    @livewire('forms-modal')
@endif

@if (class_exists(\Spatie\GoogleTagManager\GoogleTagManager::class) && config('sabhero-wrapper.gtm_enabled'))
    @include('googletagmanager::body')
@endif

@if (class_exists(\Livewire\Livewire::class) && config('sabhero-wrapper.livewire_enabled'))
    @livewireScripts
@endif
</body>
</html>
