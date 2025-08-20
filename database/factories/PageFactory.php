<?php

namespace Fuelviews\SabHeroWrapper\Database\Factories;

use Fuelviews\SabHeroWrapper\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition(): array
    {
        return [
            'slug' => $this->faker->unique()->slug(),
            'title' => $this->faker->unique()->sentence(3),
            'description' => $this->faker->paragraph(),
            'feature_image' => $this->faker->optional()->imageUrl(640, 480, 'business'),
        ];
    }
}
