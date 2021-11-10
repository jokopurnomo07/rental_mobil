@extends('layouts.dashboard')
@section('title', 'Tambah Data Merk')

@section('content')

<div class="page-heading">
    <h3>Tambah Data Merk</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('merk.index') }}">
                        <button class="btn btn-danger rounded-pill">Kembali</button>
                    </a>
                </div>
                <div class="card-body">
                    
                    <form class="form" action="{{ route('merk.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="nama_merk">Nama Merk</label>
                                    <input type="text" id="nama_merk" class="form-control"
                                        placeholder="Nama Merk" name="nama_merk">
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset"
                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
</div>

@endsection