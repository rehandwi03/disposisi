<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'rehan',
            'nama_lengkap' => 'Rehan Dwi',
            'email' => 'rehan@gmail.com',
            'password' => bcrypt('rehan123'),
            'unit_id' => '1',
            'photo' => '1580973228.jpg',
        ]);
        $user->assignRole('Admin');
        $user2 = User::create([
            'username' => 'drajat',
            'nama_lengkap' => 'Drajat Nasution',
            'email' => 'drajat@gmail.com',
            'password' => bcrypt('drajat123'),
            'unit_id' => '1',
            'photo' => '1572505228.png',
        ]);
        $user2->assignRole('Sekertariat');
        $user3 = User::create([
            'username' => 'hari',
            'nama_lengkap' => 'Hari Sapto',
            'email' => 'hari@gmail.com',
            'password' => bcrypt('hari123'),
            'unit_id' => '2',
            'photo' => '1573033499.png',
        ]);
        $user3->assignRole('Unit');
    }
}
