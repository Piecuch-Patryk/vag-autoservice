<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'VAG Autoserwis',
            'email' => 'contact@page.com',
            'post_code' => '47-220',
            'city' => 'Przyworów',
            'street' => 'Owocowa',
            'number' => '3',
            'phone' => '+48 344 987 324',
        ]);
    }
}
