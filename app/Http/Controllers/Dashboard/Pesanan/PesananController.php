<?php

namespace App\Http\Controllers\Dashboard\Pesanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        return view('dashboard.pesanan.index');
    }
}
