<?php

namespace App\Http\Controllers\Dashboard\Selesai;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class SelesaiController extends Controller
{
    public function index()
    {
        $data = Pesanan::with('user:id,name', 'cars:id,nama_mobil,merk_mobil')->where('status_peminjaman', 2)
            ->where('status_pembayaran', 1)->paginate(10);

        return view('dashboard.selesai.index', compact('data'));
    }
}
