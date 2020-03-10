<?php

use Illuminate\Database\Seeder;
use App\KlasifikasiDokumen;
class KlasifikasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KlasifikasiDokumen::create([
            'kode_dokumen' => 'A.1',
            'deskripsi' => 'Produk Hukum'
        ]);
    }
}
