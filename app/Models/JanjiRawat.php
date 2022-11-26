<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JanjiRawat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "janji_rawat";
    protected $primaryKey = "jr_id";
    public $incrementing = true;
    public $timestamps = true;

    public function Pasien()
    {
        return $this->belongsTo(Pasien::class,"ps_id","ps_id");
    }

    public function Perawat()
    {
        return $this->belongsTo(Perawat::class,"pr_id","pr_id");
    }
}
