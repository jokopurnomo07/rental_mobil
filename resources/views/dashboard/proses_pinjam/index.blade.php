@extends('layouts.dashboard')
@section('title', 'Pesanan')

@section('content')

<div class="page-heading">
    <h3>Pesanan</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Merk Mobil</th>
                                    <th>Nama Mobil</th>
                                    <th>No Pesanan</th>
                                    <th>Tanggal Sewa</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Jaminan</th>
                                    <th>Status Peminjaman</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $key => $item)
                                <tr>
                                    <td class="text-bold-500">{{ $key + 1 }}</td>
                                    <td>{{ $item->cars->merk_mobil }}</td>
                                    <td class="text-bold-500">{{ $item->cars->nama_mobil }}</td>
                                    <td>{{ $item->no_pesanan }}</td>
                                    <td>{{ $item->tgl_sewa }}</td>
                                    <td>{{ $item->tgl_selesai }}</td>
                                    <td>{{ $item->jaminan }}</td>
                                    <td>{{ ( $item->status_peminjaman == 0 ) ? "Menunggu Dibayar" : (( $item->status_peminjaman == 1 )  ? "Sedang Proses Peminjaman" : "Selesai") }}</td>
                                    <td>
                                        <button class="btn btn-success rounded-pill btn_kembali btn-sm" data-lok="{{ $item->id }}">Telah Dikembalikan</button>
                                    </td>
                                </tr>

                                @empty

                                <tr>
                                    <td class="text-bold-500" colspan="9">Tidak Ada Proses Peminjaman</td>
                                </tr>

                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $data->links() }}
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('after-script')
    

<script>

    $(document).on('click', '.btn_kembali', function(e){
        let data = $(this).data('lok')

        Swal.fire({
            title: 'Are you sure?',
            text: "Apakah anda sudah menerima mobil tersebut?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Sudah Dikembalikan!'
        }).then((result) => {
            if (result.isConfirmed) {
                
                $.ajax({
                    type: "POST",
                    url: "{{ route('proses-pinjam.kembali') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: data,
                    },
                    success: function (res) {
                        Swal.fire('Berhasil', res.message, 'success')
                        location.reload()
                    }
                });
                
            }
        })

    })
</script>

@endpush