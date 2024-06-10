@extends('main.main')

@section('ayam')
    <title>Baju Bodo | Kontak</title>
@endsection

@section('aslina')
    <div class="contact-container">
        <h2 class="text-center pt-4 mb-4">Jika Anda Ada Pertanyaan,<br> Silahkan Hubungi Kami!</h2>
        <form class="pb-2">
            <div class="form-group pb-3">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama Anda">
            </div>
            <div class="form-group pb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda">
            </div>
            <div class="form-group pb-3">
                <label for="pesan">Pesan:</label>
                <textarea class="form-control" id="pesan" rows="5" placeholder="Tuliskan pesan Anda"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Kirim</button>
        </form>
        <hr>
        <p class="text-center pt-1">Atau hubungi kami melalui:</p>
        <div class="text-center">
            <a href="https://mail.google.com/mail/u/1/#inbox?compose=CllgCJvnHwDkcmxKMzHfsGZSbjnJrmzrbnzNnFHvgrRVFzsVZFWMgnpLXSFLLVBbgXLjSfXPBqV"
                class="btn btn-outline-success me-2 pb-1"><i class="fas fa-envelope"></i> Email</a>
            <a href="https://wa.me/6282343454251?text=Halo,%20saya%20mau%20pesan" class="btn btn-outline-success pb-1"><i
                    class="fab fa-whatsapp"></i> WhatsApp</a>
        </div>
        <hr>
        <p class="text-center pt-1">Alamat Kami:</p>
        <p class="text-center pb-1"><i class="fas fa-map-marker-alt"></i> Makassar, Sulawesi Selatan</p>
    </div>
@endsection
