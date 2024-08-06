@extends('main.index')

@section('body')
    <h1>Dashboard Produk</h1>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif

    <div class="pb-3">
        <a href="/admin/produk/create" class="btn btn-success"><span data-feather="plus"></span> Buat produk</a>
    </div>

    <div class="col-lg-8">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Image</th>
                    <th>Nama Toko</th>
                    <th>Keterangan Sewa</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($baju as $nama)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nama->nama }}</td>
                        <td>{{ $nama->deskripsi }}</td>
                        <td>{{ $nama->harga }}</td>
                        <td>{{ $nama->image }}</td>
                        <td>{{ $nama->toko->nama_toko }}</td>
                        <td>{{ $nama->keterangan->nama_keterangan }}</td>
                        <td>
                            <div class="d-flex">
                                <div class="pe-2">
                                    <a href="/admin/poduk/create" class="badge bg-success"><span
                                            data-feather="plus"></span></a>
                                </div>
                                <div class="pe-2">
                                    <a href="{{ url('admin/produk/' . $nama->id . '/edit') }}" class="badge bg-warning">
                                        <span data-feather="edit"></span>
                                    </a>
                                </div>
                                <div class="pe-2">
                                    <form action="{{ url('/admin/produk/' . $nama->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="badge bg-danger border-0"
                                            onclick="return  confirm('Kamu yakin mau hapus produk?')">
                                            <span data-feather="x-circle"></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
