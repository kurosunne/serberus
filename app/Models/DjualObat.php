<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DjualObat extends Model
{
    use HasFactory;
    protected $table = "djual_obat";
    protected $primaryKey = "do_id";
    public $incrementing = true;
    public $timestamps = false;

    public function HjualObat()
    {
        return $this->hasMany(HjualObat::class,"do_id","do_id");
    }

    public function Pasien()
    {
        return $this->belongsTo(Pasien::class,"ps_id","ps_id");
    }
}
