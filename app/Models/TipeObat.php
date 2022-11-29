<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeObat extends Model
{
    use HasFactory;
    protected $table = "toko_obat";
    protected $primaryKey = "to_id";
    public $incrementing = true;
    public $timestamps = false;

    public function Obat()
    {
        return $this->hasMany(Obat::class,"to_id","to_id");
    }
}
