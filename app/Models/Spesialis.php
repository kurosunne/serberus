<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesialis extends Model
{
    use HasFactory;
    protected $table = "spesialis";
    protected $primaryKey = "sp_id";
    public $incrementing = true;
    public $timestamps = false;

    public function Dokter()
    {
        return $this->hasMany(Dokter::class,"sp_id","sp_id");
    }
}
