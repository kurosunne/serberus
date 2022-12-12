<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Obat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "obat";
    protected $primaryKey = "ob_id";
    public $incrementing = true;
    public $timestamps = true;

    public function HjualObat()
    {
        return $this->hasMany(HjualObat::class,"ob_id","ob_id");
    }

    public function TipeObat()
    {
        return $this->belongsTo(TipeObat::class,"to_id","to_id");
    }
}
