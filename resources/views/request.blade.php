@extends('main.adakah')

@section('body')
    <h1>Dashboard Akun User</h1>

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
                    <th>Akun User</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($super as $nama)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nama->nama }}</td>
                        <td>
                            <form action="{{ url('/super/akun/' . $nama->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger border-0"
                                    onclick="return confirm('Kamu yakin mau hapus akun?')">
                                    <span data-feather="x-circle"></span> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
