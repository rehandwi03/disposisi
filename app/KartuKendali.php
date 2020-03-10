<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KartuKendali extends Model
{
    // use SoftDeletes;
    protected $primaryKey = 'kartu_kendali_id';
    protected $table = 'kartu_kendali';
    protected $fillable = ['kartu_kendali_id', 'jenis_surat_id', 'buku_agenda_id', 'perihal', 'tanggal_pembuatan', 'status_kartu_kendali', 'klasifikasi_dokumen_id', 'lokasi_kartu_id', 'unit_id'];

    public function jenis_surat()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }

    public function lokasi_kartu()
    {
        return $this->belongsTo(LokasiKartu::class, 'lokasi_kartu_id');
    }

    public function klasifikasi_dokumen()
    {
        return $this->belongsTo(KlasifikasiDokumen::class, 'klasifikasi_dokumen_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function isi_kartu()
    {
        return $this->hasMany(IsiKartu::class, 'kartu_kendali_id');
    }
}
