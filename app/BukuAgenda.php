<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BukuAgenda extends Model
{
    protected $table = 'buku_agenda';
    protected $fillable = ['kode_ekspedisi', 'deskripsi'];
    protected $primaryKey = 'buku_agenda_id';

    public function kartu_kendali()
    {
        return $this->hashOne(KartuKendali::class, 'buku_agenda_id');
    }
}
