<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dokter extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "dokter";
    protected $primaryKey = "dk_id";
    public $incrementing = true;
    public $timestamps = true;

    public function Spesialis()
    {
        return $this->belongsTo(Spesialis::class,"sp_id","sp_id");
    }

    public function JanjiTemu()
    {
        return $this->hasMany(JanjiTemu::class,"dk_id","dk_id");
    }

    public function Konsultasi()
    {
        return $this->hasMany(Konsultasi::class,"dk_id","dk_id");
    }

    public function RumahSakit()
    {
        return $this->belongsTo(RumahSakit::class,"rs_id","rs_id");
    }

    public function getAuthPassword()
    {
        return $this->dk_password;
    }
}
