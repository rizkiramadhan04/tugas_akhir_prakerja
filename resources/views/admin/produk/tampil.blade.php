@extends('layouts.template')
@section('main')
<h1>Ini halaman Produk</h1>
<a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Data</a>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Ketagori</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->kategori->nama_kategori }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <img src="{{ asset('/storage/produk/' . $item->foto) }}" width="50">
                    </td>
                    <td class="d-flex gap-1"><a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
