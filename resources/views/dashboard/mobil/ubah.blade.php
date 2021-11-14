@extends('layouts.dashboard')
@section('title', 'Ubah Data Mobil')

@section('content')

<div class="page-heading">
    <h3>Ubah Data Mobil</h3>
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
                    
                    <form class="form" action="{{ route('cars.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="merk">Merk Mobil</label>
                                    <input type="text" id="merk_mobil" class="form-control" placeholder="Masukkan Merk Mobil" name="merk_mobil" required value="{{ $data->merk_mobil }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="nama_mobil">Nama Mobil</label>
                                    <input type="text" id="nama_mobil" class="form-control" placeholder="Masukkan Nama Mobil" name="nama_mobil" required value="{{ $data->nama_mobil }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="no_polisi">No Polisi</label>
                                    <input type="text" id="no_polisi" class="form-control" placeholder="Masukkan No Polisi" name="no_polisi" required value="{{ $data->no_polisi }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="tahun_pembuatan">Tahun Pembuatan Mobil</label>
                                    <input type="text" id="tahun_pembuatan" class="form-control" placeholder="Masukkan Tahun Pembuatan Mobil" name="tahun_pembuatan" required value="{{ $data->tahun_pembuatan }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="harga_sewa">Harga Sewa</label>
                                    <input type="text" id="harga_sewa" class="form-control" placeholder="Masukkan Harga Sewa" name="harga_sewa" required value="{{ $data->harga_sewa }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="bahan_bakar">Bahan Bakar</label>
                                    <input type="text" id="bahan_bakar" class="form-control" placeholder="Masukkan Bahan Bakar" name="bahan_bakar" required value="{{ $data->bahan_bakar }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="tenaga">Tenaga Mobil</label>
                                    <input type="text" id="tenaga" class="form-control" placeholder="Masukkan Tenaga Mobil" name="tenaga" required value="{{ $data->tenaga }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="warna_mobil">Warna Mobil</label>
                                    <input type="text" id="warna_mobil" class="form-control" placeholder="Masukkan Warna Mobil" name="warna_mobil" required value="{{ $data->warna_mobil }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="kapasitas">Kapasitas Penumpang</label>
                                    <input type="text" id="kapasitas" class="form-control" placeholder="Masukkan Nama Mobil" name="kapasitas" required value="{{ $data->kapasitas_penumpang }}">
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="fasilitas">Fasilitas Mobil</label>
                                    <textarea class="form-control" id="fasilitas" name="fasilitas" rows="3">{{ $data->fasilitas }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan Mobil</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $data->keterangan }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6" id="previewMobil">
                                Preview Gambar Mobil
                                <img class="card-img-top img-fluid" id="previewGambar" src="{{ asset('storage/gambar_mobil/'. $data->gambar_mobil) }}" alt="Card image cap" style="height: 20rem" />
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="gambar_mobil">Gambar Mobil</label>
                                    <input class="form-control" type="file" id="gambar_mobil" name="gambar_mobil" onchange="img(this)">
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('after-script')

@if ( $data->gambar_mobil == null )

<script>
    $('#previewMobil').hide()
</script>

@endif

<script>

    // Preview Gambar Mobil
    function img(input){
        $('#previewGambar')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
        $('#previewMobil').show()
    }

</script>

@endpush