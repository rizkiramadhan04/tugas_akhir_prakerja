@extends('layouts.app')
@section('content')

<div class="container">
  <form action="{{ route('post.store') }}" method="POST">
      @csrf
  
      <div class="mb-3">
        <label for="exampleInputTitle" class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="exampleInputTitle">
      </div>
  
  
      <div class="mb-3">
        <label for="exampleInputContent" class="form-label">Isi</label>
        <input type="text" name="isi" class="form-control @error('content') is-invalid @enderror" value="{{ old('content') }}" id="exampleInputContent">
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
  
      <button type="submit" class="btn btn-primary">Submit</button>
  
  </form>
</div>
@endsection