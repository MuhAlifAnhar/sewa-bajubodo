@extends('main.adakah')

@section('body')
    <h1>Dashboard Akun Admin</h1>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- <div class="pb-3">
        <a href="/admin/namatoko/create" class="btn btn-success"><span data-feather="plus"></span> Buat nama toko</a>
    </div> --}}

    <div class="table-responsive">
        <table id="myTable" class="display table table-bordered w-100">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Request Toko</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($super as $nama)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nama->nama }}</td>
                        <td>
                            <div class="d-flex">
                                <form action="{{ url('/super/akun/' . $nama->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge bg-danger border-0"
                                        onclick="return confirm('Kamu yakin mau hapus akun?')">
                                        <span data-feather="x-circle"></span> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
