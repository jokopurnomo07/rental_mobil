@extends('layouts.dashboard')
@section('title', 'Mobil')

@section('content')

<div class="page-heading">
    <h3>Mobil</h3>
</div>

{{-- Modal --}}
<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Detail Mobil</h5>
                <button type="button" class="close rounded-pill"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body mobil">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                @if ( auth()->user()->role == 1 )
                <div class="card-header">
                    <a href="{{ route('cars.create') }}">
                        <button class="btn btn-primary rounded-pill">Tambah Mobil</button>
                    </a>
                </div>
                @endif
                <div class="card-body">
                    {{-- Start --}}

                    @forelse ($cars as $item)
                        <div class="card mb-3 w-100">
                            <div class="row no-gutters">
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/gambar_mobil/'.$item->gambar_mobil.'') }}" alt="Gambar {{ $item->nama_mobil }}" width="250">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->nama_mobil }}</h5>
                                        <p class="card-text">
                                            Bahan Bakar : {{ $item->bahan_bakar }}
                                        </p>
                                        <p class="">
                                            Biaya Sewa : {{ $item->harga_sewa }}
                                        </p>
                                        <p class="">
                                            Deskripsi : 
                                            <span>{{ $item->keterangan }}</span>
                                        </p>
                                        @if ( auth()->user()->role == 1 )
                                        <div class="d-flex justify-content-end align-items-center">
                                            <a href="{{ route('cars.edit', $item->id) }}">
                                                <button class="btn btn-primary rounded-pill" style="margin-right: 10px">Edit</button>
                                            </a>
                                            <button class="btn btn-danger btn_hapus rounded-pill" data-lok="{{ $item->id }}">Hapus</button>
                                        </div>
                                        @endif

                                        @if ( Auth::user()->role == 0 )
                                        <div class="d-flex justify-content-end align-items-center">
                                            @if ( $item->status_mobil == 0 )
                                            <a href="{{ route('booking.pesan', $item->id) }}">
                                                <button class="btn btn-primary rounded-pill" style="margin-right: 10px">Pesan</button>
                                            </a>
                                            @endif

                                            @if ( $item->status_mobil == 1 )
                                            <button class="btn btn-danger rounded-pill" disabled style="margin-right: 10px">Sedang Dipinjam</button>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty

                    <div class="card mb-3 w-100 d-flex justify-content-center align-items-center">
                        <h4>Tidak Ada Data Mobil</h4>
                    </div>

                    @endforelse

                    {{ $cars->links() }}

                    {{-- End --}}
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('after-script')
    
<script>

    $(document).on('click', '.btn_hapus', function(e){
        let data = $(this).data('lok')

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('dashboard/cars') }}/"+data,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (res) {
                        Swal.fire('Berhasil', res.data.message, 'success')
                        location.reload()
                    }
                });
                
            }
        })

    })

    $(document).on('click', '.btn_detail', function (e) {
        
        let data = $(this).data('detail')

        $.ajax({
            type: "GET",
            url: "{{ url('dashboard/cars') }}/"+data,
            success: function (res) {

                let html = `
                <div class="table-responsive">
                    <table class="table table-lg">
                        <tbody>
                            <tr>
                                <td class="text-bold-500">Nama Mobil</td>
                                <td class="text-bold-500">${res.data.nama_mobil}</td>

                            </tr>
                            <tr>
                                <td class="text-bold-500">Merk Mobil</td>
                                <td class="text-bold-500">${res.data.merk.merk}</td>
                            </tr>
                            <tr>
                                <td class="text-bold-500">No Polisi</td>
                                <td class="text-bold-500">${res.data.no_polisi}</td>

                            </tr>
                            <tr>
                                <td class="text-bold-500">Tahun Pembuatan</td>
                                <td class="text-bold-500">${res.data.tahun_pembuatan}</td>

                            </tr>
                            <tr>
                                <td class="text-bold-500">Bahan Bakar</td>
                                <td class="text-bold-500">${res.data.bahan_bakar}</td>
                            </tr>
                            <tr>
                                <td class="text-bold-500">Tenaga</td>
                                <td class="text-bold-500">${res.data.tenaga}</td>
                            </tr>
                            <tr>
                                <td class="text-bold-500">Kapasitas Penumpang</td>
                                <td class="text-bold-500">${res.data.kapasitas_penumpang}</td>
                            </tr>
                            <tr>
                                <td class="text-bold-500">Warna Mobil</td>
                                <td class="text-bold-500">${res.data.warna_mobil}</td>
                            </tr>
                            <tr>
                                <td class="text-bold-500">Harga Sewa</td>
                                <td class="text-bold-500">${res.data.harga_sewa}</td>
                            </tr>
                            <tr>
                                <td class="text-bold-500">Fasilitas</td>
                                <td class="text-bold-500">${res.data.fasilitas}</td>
                            </tr>
                            <tr>
                                <td class="text-bold-500">Keterangan</td>
                                <td class="text-bold-500">${res.data.keterangan}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                `

                $('.mobil').html(html)

                $('#default').modal('show')
            }
        });

    })

</script>


@endpush