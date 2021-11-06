@extends('layouts.dashboard')
@section('title', 'Merk')

@section('content')

<div class="page-heading">
    <h3>Merk</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('merk.create') }}">
                        <button class="btn btn-primary rounded-pill">Tambah Data</button>
                    </a>
                </div>
                <div class="card-body">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Merk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td class="text-bold-500">{{ $key + 1 }}</td>
                                        <td>{{ $item->merk }}</td>
                                        <td>
                                            <a href="{{ route('merk.edit', $item->id) }}">
                                                <button class="btn btn-primary rounded-pill">Edit</button>
                                            </a>
                                            
                                            <button class="btn btn-danger rounded-pill btn_hapus" data-lok="{{ $item->id }}">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
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
                    url: "{{ url('dashboard/merk') }}/"+data,
                    data: {
                        _token: '{{ csrf_token() }}'
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