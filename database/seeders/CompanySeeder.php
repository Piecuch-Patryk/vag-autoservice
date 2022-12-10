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
            'post_code' => '47-220',
            'city' => 'Przyworów',
            'street' => 'Owocowa',
            'number' => '3',
        ]);
    }
}
