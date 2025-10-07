<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Floor;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Store;
use App\Models\SubCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)
            ->has(SubCategory::factory()->count(5))
            ->create();

        for ($i = 1; $i < 10; $i++) {
            $floor = Floor::factory()->create([
                'name' => "Lantai " . $i,
            ]);

            Store::factory(10)->has(
                Product::factory()->count(20)->has(ProductImage::factory()->count(3))
            )->create([
                'floor_id' => $floor->id
            ]);
        }
    }
}
