<?php

namespace Database\Seeders;

use App\Models\CustomerGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerGroup::create([
            'title' => 'Default',
            'discount' => 0,
            'is_default' => true,
        ]);
    }
}
