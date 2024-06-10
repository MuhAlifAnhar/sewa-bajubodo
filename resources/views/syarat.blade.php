@extends('main.main')

@section('ayam')
    <title>Baju Bodo | Syarat</title>
@endsection

@section('aslina')
    <div class="terms-container">
        <h2 class="text-center pt-3 mb-4">Syarat dan Ketentuan Penyewaan</h2>
        <ol class="terms-list">
            <li>Penyewaan baju bodo dan jas tutup hanya tersedia untuk mereka yang berusia 18 tahun ke atas.</li>
            <li>Penyewa harus menunjukkan identitas resmi yang berlaku pada saat pengambilan barang.</li>
            <li>Pembayaran penuh harus dilakukan sebelum pengambilan barang.</li>
            <li>Barang harus dikembalikan dalam keadaan baik dan bersih pada akhir masa penyewaan.</li>
            <li>Penyewa bertanggung jawab atas kerusakan atau kehilangan barang selama masa penyewaan.</li>
            <li>Penyewa harus mengembalikan barang sesuai dengan jadwal yang telah disepakati. Keterlambatan pengembalian
                akan dikenakan biaya tambahan.</li>
            <li>Pihak penyewa memiliki hak untuk menolak penyewaan kepada siapa pun tanpa alasan yang jelas.</li>
            <li>Syarat dan ketentuan dapat berubah tanpa pemberitahuan sebelumnya. Pastikan untuk memeriksa kembali sebelum
                setiap penyewaan.</li>
        </ol>
        <hr>
        <p class="text-center">Metode Pembayaran:</p>
        <div class="payment-info">
            <p><strong>Rekening Bank:</strong></p>
            <ul>
                <li>Bank Mandiri: 1234567890 a.n. Yusuf</li>
                <li>BCA: 0987654321 a.n. Yusuf</li>
            </ul>
            <p><strong>Dana:</strong> 1234567890</p>
        </div>
        <hr>
        <p class="text-center">Untuk informasi lebih lanjut, silakan hubungi kami:</p>
        <div class="text-center contact-info">
            <a href="https://mail.google.com/mail/u/1/#inbox?compose=CllgCJvnHwDkcmxKMzHfsGZSbjnJrmzrbnzNnFHvgrRVFzsVZFWMgnpLXSFLLVBbgXLjSfXPBqV"
                class="btn btn-outline-success me-2"><i class="fas fa-envelope"></i> Email</a>
            <a href="https://wa.me/6282343454251?text=Halo,%20saya%20mau%20bertanya" class="btn btn-outline-success"><i
                    class="fab fa-whatsapp"></i> WhatsApp</a>
        </div>
    </div>
@endsection
