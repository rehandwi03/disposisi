<?php

use Illuminate\Database\Seeder;
use App\LokasiKartu;
class LokasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LokasiKartu::create([
            'nama_lokasi' => 'Universitas Bina Insani'
        ]);
    }
}
