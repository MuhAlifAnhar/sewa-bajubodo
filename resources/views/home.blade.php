@extends('main.main')

@section('ayam')
    <title>Baju Bodo | Home</title>
@endsection

@section('aslina')
    <div id="carouselExampleAutoplaying" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/baju8.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/baju7.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/baju9.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="row m-0 p-0">
        <div class="col-6 m-0 p-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <img src="img/baju1.jpg" alt="" class="baju1 rounded float-end">
        </div>
        <div class="col-6 d-flex justify-content-start align-items-center m-0 p-0" data-aos="fade-down"
            data-aos-anchor-placement="center-bottom">
            <div class="m-0 p-0">
                <h1 class="jas m-0 p-0">Jas Tutup Khas Makassar</h1>
                <p class="jas1 m-0 p-0 pt-2">Jas tutup Makassar dalam sejarah pernikahan merupakan lambang <br> dari
                    keanggunan dan kebangsawanan sejak zaman lampau. Awalnya dikenakan <br> oleh bangsawan dan keluarga
                    kerajaan, pakaian ini menjadi simbol kemewahan <br> dan status sosial dalam acara istimewa seperti
                    pernikahan. Dengan desain yang <br> megah dan detail bordir yang rumit, jas tutup tidak hanya menjadi
                    pilihan utama <br> untuk pengantin pria, tetapi juga memegang makna simbolis yang dalam, <br> mewakili
                    kesetiaan, kehormatan, dan kebanggaan bagi para pengantin dan <br> keluarga mereka. Dalam
                    perkembangannya, jas tutup terus mempertahankan <br> keindahan dan kekayaan budaya Makassar, tetap
                    menjadi bagian tak terpisahkan <br> dari tradisi pernikahan adat Makassar yang dilestarikan dengan
                    bangga.</p>
            </div>
        </div>
    </div>
    <div class="row bg-home m-0 p-0">
        <div class="col-6 d-flex justify-content-end align-items-center text-end m-0 p-0" data-aos="fade-up"
            data-aos-anchor-placement="center-bottom">
            <div class="m-0 p-0">
                <h1 class="jas m-0 p-0">Baju Bodo Khas Makassar</h1>
                <p class="jas1 m-0 p-0 pt-2">Baju Bodo, sebuah pakaian tradisional khas dari Sulawesi Selatan, khususnya<br>
                    Makassar, memiliki sejarah yang kaya dan berakar dalam budaya dan tradisi <br> pernikahan di daerah
                    tersebut. Awalnya, baju bodo digunakan oleh bangsawan<br> dan keluarga kerajaan sebagai pakaian formal
                    untuk acara istimewa seperti<br> pernikahan dan upacara adat lainnya. Namun, seiring berjalannya waktu,
                    baju bodo<br> semakin populer dan menjadi pilihan utama untuk pengantin wanita dalam upacara<br>
                    pernikahan di Makassar. Desainnya yang anggun dan detail bordir yang rumit<br> mencerminkan kemewahan
                    dan keindahan budaya Sulawesi Selatan. Baju bodo tidak<br> hanya sekadar pakaian, tetapi juga simbol
                    dari keanggunan, kebangsawanan, dan<br> kehormatan dalam budaya pernikahan Makassar, dan terus
                    dilestarikan dengan<br> bangga sebagai bagian tak terpisahkan dari tradisi pernikahan di daerah
                    tersebut.</p>
            </div>
        </div>
        <div class="col-6 m-0 p-0" data-aos="fade-down" data-aos-anchor-placement="center-bottom">
            <img src="img/baju2.jpg" alt="" class="baju2 rounded float-start">
        </div>
        <div class="d-flex justify-content-center align-items-center m-0 p-0" data-aos="zoom-in"
            data-aos-anchor-placement="center-bottom">
            <form action="/produk" method="post" class="pb-5">
                @csrf
                <button type="submit" class="btn btn-success">
                    List produk
                </button>
            </form>
        </div>
    </div>
@endsection
