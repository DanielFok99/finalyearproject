<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create([
            'name' => 'Phone',
            'created_by' => 1,
        ]);

        ProductCategory::create([
            'name' => 'Food',
            'created_by' => 1,
        ]);
    }
}
