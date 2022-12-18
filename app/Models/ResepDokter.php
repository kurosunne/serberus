<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepDokter extends Model
{
    use HasFactory;
    protected $table = "resep_dokter";
    protected $primaryKey = "re_id";
    public $incrementing = true;
    public $timestamps = true;

    public function Konsultasi()
    {
        return $this->belongsTo(Konsultasi::class,"ks_id","ks_id");
    }

    public function Obat()
    {
        return $this->belongsTo(Obat::class,"ob_id","ob_id");
    }
}
