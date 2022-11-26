<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RumahSakit extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "rumah_sakit";
    protected $primaryKey = "rs_id";
    public $incrementing = true;
    public $timestamps = true;

    public function Dokter()
    {
        return $this->hasMany(Dokter::class,"rs_id","rs_id");
    }

    public function Perawat()
    {
        return $this->hasMany(Perawat::class,"rs_id","rs_id");
    }
}
