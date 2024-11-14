<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if (class_exists(RalphJSmit\Laravel\SEO\SEOManager::class))
        @isset($page)
            {!! seo()->for($page) !!}
        @endisset
        @isset($post)
            {!! seo()->for($post) !!}
        @endisset
        @if(empty($page) && empty($post))
            {!! seo() !!}
        @endif
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if (class_exists(\Livewire\Livewire::class) && config('app-wrapper.livewire_enabled'))
        @livewireStyles
    @endif

    @if(class_exists(\Spatie\GoogleFonts\GoogleFonts::class))
        @googlefonts
    @endif

    @if (View::exists('googletagmanager::head') && config('app-wrapper.gtm_enabled'))
        @include('googletagmanager::head')
    @endif

    @if (class_exists(\Spatie\GoogleTagManager\GoogleTagManager::class) && config('app-wrapper.gtm_enabled'))
        @include('googletagmanager::head')
    @endif
</head>
<body>
    @if (class_exists(\Fuelviews\Navigation\Navigation::class) && config('app-wrapper.navigation_enabled'))
        @component('navigation::components.navigation')
        @endcomponent
    @endif

    {{ $slot }}

    @if (class_exists(\Fuelviews\Navigation\View\Components\Footer\Footer::class) && config('app-wrapper.footer_enabled'))
        @component('navigation::components.footer.footer')
        @endcomponent
    @endif

    @if (class_exists(\Fuelviews\Forms\Forms::class) && config('app-wrapper.forms_modal_enabled'))
        @livewire('forms-modal')
    @endif

    @if (class_exists(\Spatie\GoogleTagManager\GoogleTagManager::class) && config('app-wrapper.gtm_enabled'))
        @include('googletagmanager::body')
    @endif

    @if (class_exists(\Livewire\Livewire::class) && config('app-wrapper.livewire_enabled'))
        @livewireScripts
    @endif

</body>
</html>
