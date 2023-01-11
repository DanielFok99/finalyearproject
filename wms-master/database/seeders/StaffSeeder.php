<?php

namespace Database\Seeders;

use App\Models\Staff;
use Hash;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::create([
            'name' => 'Admin',
            'contact' => '-',
            'email' => 'admin@gmail.com',
            'gender' => '-',
            'roles_id' => 1,
            'warehouse_id' => 1,
            'status' => 'active',
            'avatar' => '',
            'created_by' => 1,
            'is_verified' => true,
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        Staff::create([
            'name' => 'Daniel',
            'contact' => '-',
            'email' => 'daniel@gmail.com',
            'gender' => '-',
            'roles_id' => 2,
            'warehouse_id' => 1,
            'status' => 'active',
            'avatar' => '',
            'created_by' => 1,
            'is_verified' => true,
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);
    }
}
