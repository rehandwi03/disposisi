<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LokasiKartu extends Model
{
    protected $table = 'lokasi_kartu';
    protected $primaryKey = 'lokasi_kartu_id';
    protected $fillable = ['nama_lokasi'];
    public function kartu_kendali()
    {
        return $this->belongsTo(KartuKendali::class, 'lokasi_kartu_id');
    }
}
