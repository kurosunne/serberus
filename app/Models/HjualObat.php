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

    public function Obat()
    {
        return $this->belongsTo(Obat::class,"ob_id","ob_id");
    }

    public function DjualObat()
    {
        return $this->belongsTo(DjualObat::class,"do_id","do_id");
    }
}
