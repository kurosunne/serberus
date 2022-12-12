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
        return $this->belongsTo(HjualObat::class,"ho_id","ho_id");
    }

    public function Obat()
    {
        return $this->belongsTo(Obat::class,"ob_id","ob_id");
    }


}
