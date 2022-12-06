<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pasien extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "pasien";
    protected $primaryKey = "ps_id";
    public $incrementing = true;
    public $timestamps = true;

    public function DjualObat()
    {
        return $this->hasMany(DjualObat::class,"ps_id","ps_id");
    }

    public function JanjiTemu()
    {
        return $this->hasMany(JanjiTemu::class,"ps_id","ps_id");
    }

    public function Konsultasi()
    {
        return $this->hasMany(Konsultasi::class,"ps_id","ps_id");
    }

    public function getAuthPassword()
    {
        return $this->ps_password;
    }
}
