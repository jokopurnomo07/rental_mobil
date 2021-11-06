<?php

namespace App\Http\Controllers\Dashboard\Cars;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use App\Models\Merk;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Cars::with('merk')->paginate(10);

        return view('dashboard.mobil.index_admin', compact('cars'));
    }

    public function create()
    {
        $data = Merk::all();

        return view('dashboard.mobil.tambah', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Cars;
        $data->merk_id = $request->merk_mobil;
        $data->nama_mobil = $request->nama_mobil;
        $data->no_polisi = $request->no_polisi;

        $gmbr_mobil = $request->gambar_mobil->store('/gambar_mobil', 'public');
        $data->gambar_mobil = pathinfo($gmbr_mobil)['basename'];

        $data->harga_sewa = $request->harga_sewa;
        $data->bahan_bakar = $request->bahan_bakar;
        $data->keterangan = $request->keterangan;
        $data->tahun_pembuatan = $request->tahun_pembuatan;
        $data->tenaga = $request->tenaga;
        $data->warna_mobil = $request->warna_mobil;
        $data->kapasitas_penumpang = $request->kapasitas;
        $data->fasilitas = $request->fasilitas;
        $data->save();

        return redirect()->back()->with('success', 'Berhasil Menambahkan Data Mobil');
    }

    public function edit($id)
    {
        $data = Cars::with('merk')->where('id', $id)->first();
        $merk = Merk::all();

        return view('dashboard.mobil.ubah', compact('data', 'merk'));
    }

    public function update(Request $request, $id)
    {
        $data = Cars::find($id);
        $data->merk_id = $request->merk_mobil;
        $data->nama_mobil = $request->nama_mobil;
        $data->no_polisi = $request->no_polisi;

        if ($request->gambar_mobil !== null) {
            $gmbr_mobil = $request->gambar_mobil->store('/gambar_mobil', 'public');
            $data->gambar_mobil = pathinfo($gmbr_mobil)['basename'];
        }

        $data->harga_sewa = $request->harga_sewa;
        $data->bahan_bakar = $request->bahan_bakar;
        $data->keterangan = $request->keterangan;
        $data->tahun_pembuatan = $request->tahun_pembuatan;
        $data->tenaga = $request->tenaga;
        $data->warna_mobil = $request->warna_mobil;
        $data->kapasitas_penumpang = $request->kapasitas;
        $data->fasilitas = $request->fasilitas;
        $data->save();

        return redirect()->back()->with('success', 'Berhasil Mengubah Data Mobil');
    }

    public function destroy($id)
    {
        $data = Cars::find($id);
        $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil Menghapus Data Mobil'
        ]);
    }

    public function show($id)
    {
        $data = Cars::with('merk:id,merk')->where('id', $id)->first();
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
}
