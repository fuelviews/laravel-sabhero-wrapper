<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Fuelviews\SabHeroWrapper\Models\Page;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if a Page model exists from any package
        $pageModel = null;

        if (class_exists(Page::class)) {
            $pageModel = Page::class;
        }

        if (!$pageModel) {
            $this->command->warn('No Page model found. Skipping page seeder.');
            return;
        }

        $pages = [
            [
                'title' => 'Home Page',
                'slug' => 'home',
                'description' => 'Welcome....',
                'feature_image' => 'https://images.unsplash.com/photo-1562259949-e8e7689d7828?w=800&h=600&fit=crop',
            ],
        ];

        foreach ($pages as $pageData) {
            // Check if a page with this slug OR title already exists
            $existingPage = $pageModel::where('slug', $pageData['slug'])
                ->orWhere('title', $pageData['title'])
                ->first();

            if ($existingPage) {
                // Update existing page (prioritize finding by slug)
                $pageBySlug = $pageModel::where('slug', $pageData['slug'])->first();
                if ($pageBySlug) {
                    $pageBySlug->update($pageData);
                } else {
                    // If found by title, update that one
                    $existingPage->update($pageData);
                }
            } else {
                // Create new page only if neither slug nor title exist
                $pageModel::create($pageData);
            }
        }
    }
}
