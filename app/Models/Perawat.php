<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perawat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "perawat";
    protected $primaryKey = "pr_id";
    public $incrementing = true;
    public $timestamps = true;

    public function DjualObat()
    {
        return $this->hasMany(DjualObat::class,"pr_id","pr_id");
    }

    public function RumahSakit()
    {
        return $this->hasMany(RumahSakit::class,"rs_id","pr_id");
    }
}
