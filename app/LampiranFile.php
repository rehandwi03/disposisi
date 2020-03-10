<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LampiranFile extends Model
{
    protected $primaryKey = 'lampiran_id';
    protected $table = 'lampiran_file';
    protected $fillable = ['isi_kartu_id', 'nama_lampiran'];

    public function isikartu()
    {
        return $this->belongsTo(IsiKartu::class, 'isi_kartu_id');
    }
}
