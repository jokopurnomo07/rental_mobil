<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $table = 'cars';

    use HasFactory;

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'merk_id', 'id');
    }
}
