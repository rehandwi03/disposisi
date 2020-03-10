<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;

class Unit extends Model
{
    use SoftDeletes;
    protected $fillable = ['unit_name'];
    protected $primaryKey = 'unit_id';

    public function users()
    {
        return $this->hashMany(User::class, 'model_id');
    }

    public function kartu_kendali()
    {
        return $this->hashOne(KartuKendali::class, 'unit_id');
    }
    public function isi_kartu()
    {
        return $this->hashOne(IsiKartu::class, 'unit_id');
    }
}
