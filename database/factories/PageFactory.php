<?php

namespace database\factories;

use Fuelviews\SabHeroWrapper\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition(): array
    {
        return [
            'slug' => $this->faker->slug(),
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'feature_image' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'registerMediaConversionsUsingModelInstance' => $this->faker->boolean(),
        ];
    }
}
