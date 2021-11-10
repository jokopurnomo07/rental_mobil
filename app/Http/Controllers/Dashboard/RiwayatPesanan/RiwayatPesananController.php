<?php

namespace App\Http\Controllers\Dashboard\RiwayatPesanan;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPesananController extends Controller
{
    public function index()
    {
        $data = Pesanan::with('user:id,name', 'cars:id,nama_mobil,merk_mobil')->where('user_id', Auth::user()->id)->paginate(10);
        return view('dashboard.riwayat_pesanan.index', compact('data'));
    }
}
