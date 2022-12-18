<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = "chat";
    protected $primaryKey = "ch_id";
    public $incrementing = true;
    public $timestamps = true;

    public function Konsultasi()
    {
        return $this->belongsTo(Konsultasi::class,"ks_id","ks_id");
    }
}
