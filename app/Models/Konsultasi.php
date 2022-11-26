<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Konsultasi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "konsultasi";
    protected $primaryKey = "ks_id";
    public $incrementing = true;
    public $timestamps = true;

    public function Pasien()
    {
        return $this->belongsTo(Pasien::class,"ps_id","ps_id");
    }

    public function Chat()
    {
        return $this->hasMany(Chat::class,"ks_id","ks_id");
    }

    public function Dokter()
    {
        return $this->belongsTo(Dokter::class,"dk_id","dk_id");
    }
}
