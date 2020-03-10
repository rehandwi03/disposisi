<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisSurat extends Model
{
    use SoftDeletes;
    protected $table = 'jenis_surat';
    protected $primaryKey = 'jenis_surat_id';
    protected $fillable = ['kode_surat', 'deskripsi'];
    protected $dates = ['deleted_at'];

    public function kartu_kendali()
    {
        return $this->hashOne(KartuKendali::class, 'jenis_surat_id');
    }
}
