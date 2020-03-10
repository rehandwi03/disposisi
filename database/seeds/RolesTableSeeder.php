<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role_name' => 'Admin',
            'guard_name' => 'web'
        ]);
        Role::create([
            'role_name' => 'Sekertariat',
            'guard_name' => 'web'
        ]);
        Role::create([
            'role_name' => 'Unit',
            'guard_name' => 'web'
        ]);
    }
}
