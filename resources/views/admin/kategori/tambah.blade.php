@extends('layouts.template')
@section('main')
<form action="{{ route('kategori.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="exampleInputTitle" class="form-label">Nama Kategori</label>
      <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{ old('nama_kategori') }}" id="exampleInputTitle">
    </div>


    <div class="mb-3">
      <label for="exampleInputContent" class="form-label">Deskripsi</label>
      <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}" id="exampleInputContent">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>
@endsection