@extends('login.login')

@section('logine')
    <title>Registrasi</title>
@endsection

@section('login')
    <div class="container">
        <h1 class="text-center font-weight-bold mb-5 mt-3">Form Registrasi</h1>
        <div class="d-flex justify-content-center">
            <form class="form-masuk" id="loginForm" method="post" action="/registrasi">
                @csrf
                <div class="form-group">
                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama"
                        class="form-control @error('nama')is-invalid @enderror" value="{{ old('nama') }}" required />
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
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
                        class="form-control @error('password')is-invalid @enderror" required />
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                        name="role">
                        {{-- <option selected>Open this select menu</option> --}}
                        <option value="1">User</option>
                        <option value="2">Admin</option>
                        {{-- <option value="3">Super</option> --}}
                    </select>
                    <label for="floatingSelect">Pilih role anda</label>
                </div>
                <button type="submit" class="btn tombol-masuk">Registrasi</button>
            </form>
        </div>
        <div>
            <small class="d-block text-center text-bold mt-2 mb-5">
                Already registered?
                <a href="/">
                    Login!
                </a>
            </small>
        </div>
        <div class="digides-digital">
            <div class="d-flex justify-content-center align-items-center">
                <img src="img/icon.png" id="icon" alt="icon" class="mr-2">
                <p class="m-0">2024 Powered by <span id="pt">Baju Bodo</span> dan <span id="pt">Jas Tutup
                        Indonesia</span></p>
            </div>
        </div>
    </div>
@endsection
