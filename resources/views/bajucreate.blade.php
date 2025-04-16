@extends('main.index')

@section('body')
    <h1>Dashboard Create Produk</h1>

    <div class="col-lg-8">
        <form method="post" action="/admin/produk" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror"
                    id="nama_produk" required autofocus value="{{ old('nama_produk') }}">
                @error('nama_produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                    id="deskripsi" required value="{{ old('deskripsi') }}">
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror"
                    id="harga" required value="{{ old('harga') }}">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Masukkan foto produk</label>
                <img class="img-preview img-fluid mb-3">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="nama_toko">Nama Toko</label>
                <select name="nama_toko" class="form-control @error('nama_toko') is-invalid @enderror" id="nama_toko"
                    required value="{{ old('nama_toko') }}">
                    @error('nama_toko')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @foreach ($toko as $tokoo)
                        <option value="{{ $tokoo->id }}">{{ $tokoo->nama_toko }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="nama_keterangan">Keterangan Baju</label>
                <select name="nama_keterangan" class="form-control @error('nama_keterangan') is-invalid @enderror"
                    id="nama_keterangan" required value="{{ old('nama_keterangan') }}">
                    @error('nama_keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @foreach ($kete as $keterangan)
                        <option value="{{ $keterangan->id }}">{{ $keterangan->nama_keterangan }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Buat Produk</button>
        </form>
    </div>
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
