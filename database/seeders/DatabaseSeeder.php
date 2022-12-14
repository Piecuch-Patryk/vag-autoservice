<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\CompanySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@page.com',
        ]);

        Category::factory()
                ->has(Product::factory()->count(10))
                ->count(10)
                ->sequence(fn ($sequence) => ['order' => $sequence->index + 1])
                ->create();
        
        $this->call([
            CompanySeeder::class,
        ]);
    }
}
