@extends('dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Data Pasien</h5>
           
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NO PASIEN</th>
                    <th>FOTO</th>
                    <th>NAMA</th>
                    <th>UMUR</th>
                    <th>JENIS KELAMIN</th>
                    <th>TANGGAL BUAT</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasiens as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->no_pasien }}</td>
                        <td>
                            @if ($item->foto)
                                <a href="{{ Storage::url($item->foto) }}" target="blank">
                                    <img src="{{ Storage::url($item->foto) }}" width="50">
                                </a>
                            @endif
                        </td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->umur }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="/pasiens/{{ $item->id }}/edit" class="btn btn-warning btn-sm mr-2">Edit</a>

                            <form action="{{ route('pasiens.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?')">
                                    Hapus
                                </button>
                            </form>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $pasiens->links() !!}
    </div>
    </div>
@endsection
