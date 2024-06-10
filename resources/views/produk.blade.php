@extends('main.main')

@section('ayam')
    <title>Produk dan Toko</title>
@endsection

@section('aslina')
    <div class="container pt-5">
        <h1>Daftar Toko dan Produk</h1>
        <div class="row pb-5 pt-3">
            @foreach ($tokos as $toko)
                <div class="col-md-3 d-flex justify-content-center mb-4">
                    <div class="card text-center" style="width: 18rem;">
                        <a href="{{ route('produk.byToko', ['tokoId' => $toko->id]) }}"
                            class="text-decoration-none text-dark">
                            <div class="card-body">
                                <p class="card-text bold">{{ $toko->nama_toko }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row pb-5">
            @if ($baju->isEmpty())
                <div class="col-md-12">
                    <p class="text-center">Pilih toko untuk melihat produk.</p>
                </div>
            @else
                @foreach ($baju as $b)
                    <div class="col-md-3 d-flex justify-content-center mb-4">
                        <a href="https://wa.me/6282343454251?text=Halo,%20saya%20mau%20bertanya%20tentang%20produk%20{{ urlencode($b->nama) }}"
                            class="text-decoration-none text-dark">
                            <div class="card text-center" style="width: 18rem;">
                                <img src="{{ asset('storage/' . $b->image) }}" class="card-img-top"
                                    alt="{{ $b->nama }}">
                                <div class="card-body">
                                    <p class="card-text bold">{{ $b->nama }}</p>
                                    <p class="card-text">Rp. {{ number_format($b->harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
