<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JanjiTemu extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "janji_temu";
    protected $primaryKey = "jt_id";
    public $incrementing = true;
    public $timestamps = true;

    public function Pasien()
    {
        return $this->belongsTo(Pasien::class,"ps_id","ps_id");
    }

    public function Dokter()
    {
        return $this->belongsTo(Dokter::class,"dk_id","dk_id");
    }
}
