<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    
    use HasFactory;

    protected $fillable = [
        'status_pembayaran',
        'status_peminjaman'
    ];

    public function cars()
    {
        return $this->belongsTo(Cars::class, 'cars_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
