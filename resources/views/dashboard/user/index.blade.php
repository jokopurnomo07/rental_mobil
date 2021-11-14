@extends('layouts.dashboard')
@section('title', 'User')

@section('content')

<div class="page-heading">
    <h3>User</h3>
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
                                    <th>Nama User</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $key => $item)
                                <tr>
                                    <td class="text-bold-500">{{ $key + 1 }}</td>
                                    <td>{{ $item->nama_lengkap ? $item->nama_lengkap : '-' }}</td>
                                    <td class="text-bold-500">{{ $item->email ? $item->email : '-' }}</td>
                                    <td>{{ $item->alamat ? $item->alamat : '-' }}</td>
                                    <td>{{ $item->no_telephone ? $item->no_telephone : '-' }}</td>
                                </tr>

                                @empty

                                <tr>
                                    <td class="text-bold-500" colspan="9">Tidak Ada Data User</td>
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