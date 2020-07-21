<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KlasifikasiDokumen extends Model
{
    protected $table = 'klasifikasi_dokumen';
    protected $fillable = ['kode_dokumen', 'deskripsi_dokumen'];
    protected $primaryKey = 'klasifikasi_dokumen_id';

    public function kartu_kendali()
    {
        return $this->hashOne(KartuKendali::class, 'klasifikasi_dokumen_id');
    }
}
