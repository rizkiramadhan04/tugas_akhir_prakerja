@extends('layouts.template')
@section('main')
<form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label for="exampleInputTitle" class="form-label">Nama Produk</label>
      <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk') }}" id="exampleInputTitle">
    </div>


    <div class="mb-3">
      <label for="exampleInputContent" class="form-label">Harga</label>
      <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" id="exampleInputContent">
    </div>

    <div class="mb-3">
      <label for="exampleInputContent" class="form-label">Deskripsi</label>
      <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}" id="exampleInputContent">
    </div>

    <div class="mb-3">
      <label for="exampleInputKategori" class="form-label">Kategori</label>
      <select type="text" name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" id="exampleInputKategori">
        <option value="">-- choose kategori --</option>
          @foreach ($kategori as $item)
            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
          @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="exampleInputContent" class="form-label">Foto</label>
      <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" value="{{ old('file') }}" id="exampleInputContent">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>
@endsection