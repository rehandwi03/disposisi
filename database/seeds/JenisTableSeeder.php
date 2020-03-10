<?php

use Illuminate\Database\Seeder;
use App\JenisSurat;

class JenisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisSurat::create([
            'kode_surat' => 'SI',
            'deskripsi' => 'Surat Internal'
        ]);
    }
}
