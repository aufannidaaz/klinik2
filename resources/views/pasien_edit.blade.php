@extends('dashboard')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h5 class="card-header">Edit Data Pasien <b>{{ $pasien->nama }}</b></h5>
                <div class="card-body">
                    <form action="{{ route('pasiens.update', $pasien->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        
                        <!-- Foto Pasien -->
                        <div class="form-group mt-3">
                            <label for="foto">Foto Pasien (jpg, jpeg, png)</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                            <span class="text-danger">{{ $errors->first('foto') }}</span>
                            @if ($pasien->foto)
                                <img src="{{ Storage::url($pasien->foto) }}" alt="Foto Pasien" class="img-thumbnail mt-2" style="width:100px">
                            @endif
                        </div>

                        <!-- Nama Pasien -->
                        <div class="form-group mt-3">
                            <label for="nama">Nama Pasien</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $pasien->nama }}">
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        </div>

                        <!-- Nomor Pasien -->
                        <div class="form-group mt-3">
                            <label for="no_pasien">Nomor Pasien</label>
                            <input type="text" class="form-control @error('no_pasien') is-invalid @enderror" id="no_pasien" name="no_pasien" value="{{ old('no_pasien') ?? $pasien->no_pasien }}">
                            <span class="text-danger">{{ $errors->first('no_pasien') }}</span>
                        </div>

                        <!-- Umur Pasien -->
                        <div class="form-group mt-3">
                            <label for="umur">Umur Pasien</label>
                            <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur" value="{{ old('umur') ?? $pasien->umur }}">
                            <span class="text-danger">{{ $errors->first('umur') }}</span>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="form-group mt-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="laki-laki" {{ old('jenis_kelamin') ?? $pasien->jenis_kelamin === 'laki-laki' ? 'checked' : '' }}>
                                <label class="form-check-label" for="laki_laki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" {{ old('jenis_kelamin') ?? $pasien->jenis_kelamin === 'perempuan' ? 'checked' : '' }}>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                            <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                        </div>

                        <!-- Alamat -->
                        <div class="form-group mt-3">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') ?? $pasien->alamat }}">
                            <span class="text-danger">{{ $errors->first('alamat') }}</span>
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
