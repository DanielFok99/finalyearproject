<?php

namespace Database\Seeders;

use App\Models\ProductUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductUnit::create([
            'name' => 'pieces',
            'short_name' => 'PCS',
            'is_default' => false,
            'created_by' => 1,

        ]);

        ProductUnit::create([
            'name' => 'box',
            'short_name' => 'BOX',
            'is_default' => true,
            'created_by' => 1,

        ]);
    }
}
