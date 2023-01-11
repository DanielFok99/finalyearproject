<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warehouse::create([
            'name' => 'Default Warehouse',
            'address' => '-',
            'is_default' => true,
            'contact_number' => '0123456789',
            'person_in_charge_id' => 1,
        ]);
    }
}
