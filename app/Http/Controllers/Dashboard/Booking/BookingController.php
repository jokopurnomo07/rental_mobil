<?php

namespace App\Http\Controllers\Dashboard\Booking;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use App\Models\Merk;
use App\Models\Pesanan;
use CreatePesananTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $data = Pesanan::with('user:id,name', 'cars:id,nama_mobil,merk_mobil')->where('status_peminjaman', 0)
            ->where('status_pembayaran', 0)->paginate(10);

        return view('dashboard.booking.index', compact('data'));
    }

    public function pesan($id)
    {
        $data = Cars::find($id);
        return view('dashboard.booking.pesan', compact('data'));
    }

    public function konfirmasi(Request $request)
    {
        $data = Pesanan::find($request->id)->update(['status_pembayaran' => 1, 'status_peminjaman' => 1]);
        return redirect()->back()->with(['success', 'Berhasil Konfirmasi Pembayaran']);
    }

    public function create()
    {
        return view('dashboard.booking.tambah');
    }

    public function store(Request $request)
    {
        $data = new Pesanan;
        $data->user_id = Auth::user()->id;
        $data->cars_id = $request->cars_id;
        $data->no_pesanan = 'B-' . time() . '' . date('dmy');
        $data->denda = 0;
        $data->tgl_sewa = $request->tgl_pesan;
        $data->tgl_selesai = $request->tgl_kembali;
        $data->jaminan = $request->jaminan;

        $foto_jaminan = $request->foto_jaminan->store('/foto_jaminan', 'public');
        $data->foto_jaminan = pathinfo($foto_jaminan)['basename'];

        $data->status_pembayaran = 0;
        $data->status_peminjaman = 0;

        $data->save();

        $cars = Cars::find($request->cars_id)->update(['status_mobil' => 1]);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Data Merk');
    }

    public function edit($id)
    {
        $data = Merk::findOrFail($id);

        return view('dashboard.booking.ubah', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Merk::find($id);
        $data->merk = $request->nama_merk;
        $data->save();

        return redirect()->back()->with('success', 'Berhasil Mengubah Data Merk');
    }

    public function destroy($id)
    {
        $data = Merk::find($id);
        $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil Menghapus Data'
        ]);
    }
}
