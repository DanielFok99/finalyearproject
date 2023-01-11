<?php

namespace Database\Seeders;

use App\Models\ProductAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductAttribute::create([
            'name' => 'Size',
            'created_by' => 1,
        ]);

        ProductAttribute::create([
            'name' => 'Color',
            'created_by' => 1,
        ]);
    }
}
