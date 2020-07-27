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
    KlasifikasiDokumen::create(
        [
        'kode_dokumen' => 'A.1',
        'deskripsi_dokumen' => 'Semua dokumen ketentuan peraturan perundang-undangan baik langsung dan tidak langsung yang terkait dengan penyelenggaraan perguruan tinggi'
        ] 
    );
    KlasifikasiDokumen::create([
        'kode_dokumen' => 'A.2',
        'deskripsi_dokumen' => 'Akta pendirian, perubahan akta, legilitas dari kemenHumHAM'   
    ]);
    KlasifikasiDokumen::create([
        'kode_dokumen' => 'B.1',
        'deskripsi_dokumen' => 'Semua dokumen ketentuan peraturan perundang-undangan baik langsung dan tidak langsung yang terkait dengan penyelenggaraan perguruan tinggi'  
    ]);
    KlasifikasiDokumen::create([
        'kode_dokumen' => 'B.2',
        'deskripsi_dokumen' => 'Akta pendirian, perubahan akta, legilitas dari kemenHumHAM'   
    ]);
    }
}
