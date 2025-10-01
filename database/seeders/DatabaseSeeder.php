<?php

namespace Database\Seeders;

use App\Models\Floor;
use App\Models\Store;
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
        for ($i = 1; $i < 10; $i++) {
            $floor = Floor::factory()->create([
                'name' => "Lantai " . $i,
            ]);

            Store::factory(10)->create([
                'floor_id' => $floor->id
            ]);
        }
    }
}
