@extends('layouts.dashboard')
@section('title', 'Pesan Mobil')

@section('content')

<div class="page-heading">
    <h3>Pesan Mobil</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('cars.index') }}">
                        <button class="btn btn-danger rounded-pill">Kembali</button>
                    </a>
                </div>
                <div class="card-body">
                    {{-- Start --}}

                    <div class="col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                <img class="card-img-top img-fluid" src="{{ asset('storage/gambar_mobil/'.$data->gambar_mobil.'') }}"
                                    alt="Card image cap" style="height: 35rem" />
                                <div class="card-body">

                                    <!-- Table with outer spacing -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                            <div class="table-responsive">
                                                <table class="table table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-bold-500">No Polisi</td>
                                                            <td>{{ $data->no_polisi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Bahan Bakar</td>
                                                            <td>{{ $data->bahan_bakar }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Tenaga</td>
                                                            <td>{{ $data->tenaga }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Warna Mobil</td>
                                                            <td>{{ $data->warna_mobil }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Kapasitas Penumpang</td>
                                                            <td>{{ $data->kapasitas_penumpang }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Fasilitas</td>
                                                            <td>{{ $data->fasilitas }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Keterangan</td>
                                                            <td>{{ $data->keterangan }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="pricing">
                                                <div class="row align-items-center">
                                                    <div class="card card-highlighted">
                                                        <form action="{{ route('booking.store') }}" method="post" enctype="multipart/form-data">
                                                            @csrf

                                                            <input type="hidden" name="cars_id" value="{{ $data->id }}">
                                                            <div class="card-header text-center">
                                                                <h4 class="card-title">{{ $data->merk_mobil }} {{ $data->nama_mobil }}</h4>
                                                                <p></p>
                                                            </div>
                                                            <h5 class="price text-white">Harga Sewa : {{ $data->harga_sewa }}</h5>
                                                            
                                                            <input type="date" class="form-control mt-2" placeholder="Tanggal Pesan" id="tgl_pesan" name="tgl_pesan">
    
                                                            <input type="date" class="form-control mt-3" placeholder="Tanggal Dikembalikan" id="tgl_kembali" name="tgl_kembali">
    
                                                            <input type="text" class="form-control mt-3" placeholder="Jaminan" id="jaminan" name="jaminan">
                                                            
                                                            <input type="file" class="form-control mt-3" placeholder="Foto Jaminan" id="foto_jaminan" name="foto_jaminan">
    
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-outline-white btn-block">Pesan</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- End --}}
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
