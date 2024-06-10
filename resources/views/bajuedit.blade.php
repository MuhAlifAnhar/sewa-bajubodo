@extends('main.index')

@section('body')
    <h1>Dashboard Edit Produk</h1>

    <div class="col-lg-8">
        <form method="post" action="{{ url('admin/produk/' . $baju->id) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group mb-3">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror"
                    id="nama_produk" required autofocus value="{{ old('nama_produk', $baju->nama) }}">
                @error('nama_produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror"
                    id="harga" required autofocus value="{{ old('harga', $baju->harga) }}">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Masukkan foto produk</label>
                <input type="hidden" name="oldImage" value="{{ $baju->image }}">
                @if ($baju->image)
                    <img src="{{ asset('storage/' . $baju->image) }}" class="img-preview img-fluid mb-3 d-block">
                @else
                    <img class="img-preview img-fluid mb-3">
                @endif
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
                    required>
                    @foreach ($toko as $tokoo)
                        <option value="{{ $tokoo->id }}" {{ $baju->id_toko == $tokoo->id ? 'selected' : '' }}>
                            {{ $tokoo->nama_toko }}</option>
                    @endforeach
                </select>
                @error('nama_toko')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
