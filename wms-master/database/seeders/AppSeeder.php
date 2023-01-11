<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            StaffSeeder::class,
            WarehouseSeeder::class,
            AttributeSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            GroupSeeder::class,
            UnitSeeder::class,
            CustomerGroupSeeder::class,
        ]);
    }
}
