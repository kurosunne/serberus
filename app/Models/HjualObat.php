<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HjualObat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "hjual_obat";
    protected $primaryKey = "ho_id";
    public $incrementing = true;
    public $timestamps = true;

    public function Pasien()
    {
        return $this->belongsTo(Pasien::class,"ps_id","ps_id");
    }

    public function DjualObat()
    {
        return $this->hasMany(DjualObat::class,"ho_id","ho_id");
    }

    // protected $fillable = ['ps_id','ho_status','ho_orderId','ho_grossAmount','ho_paymentType','ho_paymentCode','ho_pdfUrl'];
}
