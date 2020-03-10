<?php

use Illuminate\Database\Seeder;
use App\BukuAgenda;

class BukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BukuAgenda::create([
            'kode_ekspedisi' => '7.14',
            'deskripsi' => 'Dana beasiswa Mercubuana a.n. AIM'
        ]);
    }
}
