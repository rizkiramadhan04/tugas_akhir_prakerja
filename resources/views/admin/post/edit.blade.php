@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Edit Data</h2>
    <form action="{{ route('post.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputTitle" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ $data->judul }}" id="exampleInputTitle">
          </div>
      
      
          <div class="mb-3">
            <label for="exampleInputContent" class="form-label">Isi</label>
            <input type="text" name="isi" class="form-control @error('isi') is-invalid @enderror" value="{{ $data->isi }}" id="exampleInputContent">
          </div>

          <div class="mb-3">
            <label for="exampleInputKategori" class="form-label">Kategori</label>
            <select type="text" name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" id="exampleInputKategori">
              <option value="">-- choose kategori --</option>
                @foreach ($kategori as $item)
                  <option value="{{ $item->id }}" @if ($data->kategori_id == $item->id) selected @endif>{{ $item->nama_kategori }}</option>
                @endforeach
            </select>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection