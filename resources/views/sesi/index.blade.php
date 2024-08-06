@extends('login.login')

@section('logine')
    <title>Login</title>
@endsection

@section('login')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1 class="text-center font-weight-bold mb-5">Selamat Datang</h1>
        <div class="d-flex justify-content-center">
            <form class="form-masuk" id="loginForm" method="post" action="/login">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Masukkan Email"
                        class="form-control @error('email')is-invalid @enderror" value="{{ old('email') }}" required />
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Masukkan Password"
                        class="form-control" required />
                </div>
                <button type="submit" class="btn tombol-masuk">Masuk</button>
            </form>
        </div>
        <div>
            <small class="d-block text-center text-bold mt-2">
                Not registered?
                <a href="/registrasi">
                    Registrasi Now!
                </a>
            </small>
        </div>
        <div class="scan text-center mt-5">
            <a href="/registrasi" type="button" class="btn tombol-scan mb-5" id="scans">
                <div class="d-flex justify-content-center align-items-center h-100 mb-5">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="img/scan.png" id="scan" alt="scan" class="mr-2" />
                        <p>Registrasi</p>
                    </div>
                </div>
            </a>
            <div class="digides-digital">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="img/icon.png" id="icon" alt="icon" class="mr-2">
                    <p class="m-0">2024 Powered by <span id="pt">Baju Bodo</span> dan <span id="pt">Jas
                            Tutup Indonesia</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
