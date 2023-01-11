<?php

namespace Database\Seeders;

use App\Models\ProductGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductGroup::create([
            'name' => 'new',
            'created_by' => 1,
        ]);

        ProductGroup::create([
            'name' => 'used',
            'created_by' => 1,
        ]);
    }
}
