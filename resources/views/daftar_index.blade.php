@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">DATA PENDAFTARAN PASIEN</div>
                    <form action="">
                        <div class="row g-3 mb-2">
                            <div class="col">
                                <input type="text" name="q" class="form-control" placeholder="Nama atau Nomor Pasien"
                                    value="{{ request('q') }}">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">CARI</button>
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <a href="/daftar/create" class="btn btn-primary btn-sm mt-3">Tambah Data</a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Poli</th>
                                    <th>Keluhan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftar as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->pasien ? $item->pasien->nama : '-' }}</td>
                                        <td>{{ $item->pasien ? $item->pasien->jenis_kelamin : '-' }}</td>
                                        <td>{{ $item->tanggal_daftar ? $item->tanggal_daftar->format('d M Y') : '-' }}</td>
                                        <td>{{ $item->poli ? $item->poli->nama : '-' }}</td>
                                        <td>{{ $item->keluhan ?? '-' }}</td>
                                    </tr>
                                    <td>
                                        <a href="/daftar/{{ $item->id }}" class="btn btn-info btn-sm">Detail</a>
                                        <form action="/daftar/{{ $item->id }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                        </form>
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $daftar->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
