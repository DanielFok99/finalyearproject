<?php

namespace Database\Seeders;

use App\Models\ProductBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductBrand::create([
            'name' => 'Apple',
            'created_by' => 1,
        ]);

        ProductBrand::create([
            'name' => 'Samsung',
            'created_by' => 1,
        ]);
    }
}
