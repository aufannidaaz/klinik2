@extends('dashboard')

@section('content')
    <div class="container">
        <h1>Tambah Poli</h1>
        <form action="{{ route('polis.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Poli</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="biaya">Biaya</label>
                <input type="number" name="biaya" id="biaya" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
            <a href="{{ route('polis.index') }}" class="btn btn-secondary mt-2">Batal</a>
        </form>
    </div>
@endsection
