<?php

namespace App\Http\Controllers\Dashboard\Merk;

use App\Http\Controllers\Controller;
use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    public function index()
    {
        $data = Merk::paginate(10);

        return view('dashboard.merk.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.merk.tambah');
    }

    public function store(Request $request)
    {
        $data = new Merk;
        $data->merk = $request->nama_merk;
        $data->save();

        return redirect()->back()->with('success', 'Berhasil Menambahkan Data Merk');
    }

    public function edit($id)
    {
        $data = Merk::findOrFail($id);

        return view('dashboard.merk.ubah', compact('data'));
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
