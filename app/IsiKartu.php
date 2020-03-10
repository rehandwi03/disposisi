<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IsiKartu extends Model
{
    // use SoftDeletes;
    protected $primaryKey = 'isi_kartu_id';
    protected $table = 'isi_kartu';
    protected $fillable = ['kartu_kendali_id', 'unit_id', 'tanggal_membalas', 'disposisi', 'status_isi_kartu', 'from', 'to'];

    public function kartu_kendali()
    {
        return $this->belongsTo(KartuKendali::class, 'kartu_kendali_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function lampiran()
    {
        return $this->hasMany(LampiranFile::class, 'isi_kartu_id');
    }
}
