<?php

namespace App\Http\Controllers\Dashboard\ProsesPinjam;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class ProsesPinjamController extends Controller
{
    public function index()
    {
        $data = Pesanan::with('user:id,name', 'cars:id,nama_mobil,merk_mobil')->where('status_peminjaman', 1)
        ->where('status_pembayaran', 1)->paginate(10);

        return view('dashboard.proses_pinjam.index', compact('data'));
    }

    public function kembali(Request $request)
    {
        $data = Pesanan::find($request->id);
        $data->status_peminjaman = 2;

        $cars = Cars::find($data->cars_id);
        $cars->status_mobil = 0;

        $data->save();
        $cars->save();

        return response()->json([
            'status' => true,
            'message' => 'Mobil Telah Dikembalikan'
        ]);
    }
}
