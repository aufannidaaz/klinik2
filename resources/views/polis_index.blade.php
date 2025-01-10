@extends('dashboard')

@section('content')
    <div class="card-body">
        <table class="table table-striped">
            <thead class="bg-light">
                <tr>
                    <th>Nama</th>
                    <th>Biaya</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($polis as $poli)
                    <tr>
                        <td>{{ $poli->nama }}</td>
                        <td>Rp{{ number_format($poli->biaya, 0, ',', '.') }}</td>
                        <td>{{ $poli->keterangan }}</td>
                        <td>
                            <a href="{{ route('polis.edit', $poli->id) }}" class="btn btn-info btn-sm">Edit</a>

                            <form action="{{ route('polis.destroy', $poli->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection