@extends('main.adakah')

@section('body')
    <h1>Dashboard Membuat Toko</h1>

    <div class="col-lg-8">
        <form method="post" action="/admin/namatoko">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama toko</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    required autofocus value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="akun_admin">Akun Admin</label>
                <select name="akun_admin" class="form-control @error('akun_admin') is-invalid @enderror" id="akun_admin"
                    required value="{{ old('akun_admin') }}">
                    @error('akun_admin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @foreach ($admin as $akuna)
                        <option value="{{ $akuna->id }}">{{ $akuna->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Membuat Toko</button>
        </form>
    </div>
@endsection
