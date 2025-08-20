<?php

use Fuelviews\SabHeroWrapper\Models\Page;
use RalphJSmit\Laravel\SEO\Support\SEOData;

it('has fillable attributes', function () {
    $fillable = [
        'title',
        'slug',
        'description',
        'feature_image',
    ];

    $page = new Page();

    expect($page->getFillable())->toBe($fillable);
});

it('uses required traits', function () {
    $page = new Page();

    expect(class_uses($page))->toContain(
        'RalphJSmit\Laravel\SEO\Support\HasSEO',
        'Spatie\MediaLibrary\InteractsWithMedia'
    );
});

it('implements required interfaces', function () {
    $page = new Page();

    expect($page)->toBeInstanceOf('Spatie\MediaLibrary\HasMedia');
});

it('can be instantiated', function () {
    $page = new Page();

    expect($page)->toBeInstanceOf(Page::class)
        ->and($page)->toBeInstanceOf(\Illuminate\Database\Eloquent\Model::class);
});
