@extends('dashboard')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h5 class="card-header">Edit Data Poli <b>{{ $poli->nama }}</b></h5>
                <div class="card-body">
                    <form action="{{ route('polis.update', $poli->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        
                        <!-- Nama Poli -->
                        <div class="form-group mt-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $poli->nama }}">
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        </div>

                        <!-- Biaya -->
                        <div class="form-group mt-3">
                            <label for="biaya">Biaya</label>
                            <input type="text" class="form-control @error('biaya') is-invalid @enderror" id="biaya" name="biaya" value="{{ old('biaya') ?? $poli->biaya }}">
                            <span class="text-danger">{{ $errors->first('biaya') }}</span>
                        </div>

                        <!-- Keterangan -->
                        <div class="form-group mt-3">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') ?? $poli->keterangan }}">
                            <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                        </div>

                        <!-- Tombol Update -->
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
