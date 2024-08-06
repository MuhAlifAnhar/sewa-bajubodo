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
                            <div class="card text-center ad" style="width: 18rem;" data-baju-id="{{ $b->id }}">
                                <img src="{{ asset('storage/' . $b->image) }}" class="card-img-top"
                                    alt="{{ $b->nama }}">
                                <div class="card-body m-0 p-0">
                                    <p class="card-text bold">{{ $b->nama }}</p>
                                    <p class="card-text bold">{{ $b->deskripsi }}</p>
                                    <p class="card-text">Rp. {{ number_format($b->harga, 0, ',', '.') }}</p>
                                    @if ($b->nama_keterangan == 1)
                                        <p class="card-footer bg-danger bold sewa text-white"
                                            data-status="{{ $b->keterangan->nama_keterangan }}">
                                            {{ $b->keterangan->nama_keterangan }}
                                        </p>
                                    @elseif ($b->nama_keterangan == 2)
                                        <p class="card-footer bg-warning bold sewa text-white"
                                            data-status="{{ $b->keterangan->nama_keterangan }}">
                                            {{ $b->keterangan->nama_keterangan }}
                                        </p>
                                    @elseif ($b->nama_keterangan == 3)
                                        <p class="card-footer bg-success bold sewa text-white"
                                            data-status="{{ $b->keterangan->nama_keterangan }}">
                                            {{ $b->keterangan->nama_keterangan }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua elemen dengan class 'ad' (card)
            const cardElems = document.querySelectorAll('.ad');

            // Loop through semua elemen dan tambahkan event listener untuk setiap elemen
            cardElems.forEach(card => {
                card.addEventListener('click', function() {
                    console.log('Card clicked'); // Debug: Check if card click is detected

                    // Ambil element p dengan class 'sewa' di dalam card yang diklik
                    let keteranganElem = this.querySelector('.sewa');

                    // Ambil status keterangan dari atribut data-status
                    let status = keteranganElem.getAttribute('data-status');
                    console.log('Status:', status); // Debug: Check status

                    // Cek apakah status saat ini adalah 'Ready'
                    if (status === 'Ready') {
                        // Kirim permintaan AJAX untuk menyimpan perubahan status
                        let bajuId = this.getAttribute(
                            'data-baju-id'); // Ambil ID baju dari dataset
                        console.log('Baju ID:', bajuId); // Debug: Check baju ID

                        fetch("{{ route('produk.updateStatus') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    baju_id: bajuId
                                })
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                                console.log('Response:',
                                    data); // Debug: Output response dari server
                                if (data.status === 'success') {
                                    // Ubah tampilan di client-side jika perlu
                                    keteranganElem.textContent = 'Di booking';
                                    keteranganElem.style.color =
                                        'white'; // Warna kuning untuk Di booking
                                    keteranganElem.setAttribute('data-status', 'Di booking');
                                    // Optional: Nonaktifkan event listener setelah diklik sekali
                                    card.removeEventListener('click', arguments.callee);
                                } else {
                                    console.error('Error:', data
                                        .message); // Debug: Output error message
                                }
                            })
                            .catch(error => {
                                console.error('Fetch Error:',
                                    error); // Debug: Output fetch error
                            });
                    }
                });
            });
        });
    </script>
@endsection
