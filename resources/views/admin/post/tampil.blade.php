@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Ini halaman Posts</h1>
    <a href="{{ route('post.create') }}" class="btn btn-primary mb-5">Tambah Data</a>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Tanggal Dibuat</th>
                    <th>Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->isi }}</td>
                        <td>{{ \Carbon\Carbon::make($item->tanggal_dibuat)->format('d-m-Y H:i:s') }}</td>
                        <td>{{ $item->kategori->nama_kategori }}</td>
                        <td class="d-flex gap-1"><a href="{{ route('post.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('post.destroy', $item->id) }}" method="POST">
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

    <div class="content-rekomendasi" id="contentRecomendasi" style="margin-top: 150px">
        <h2>Recomendasi Produk Berdasarkan Kategori</h2>
        <div class="table-responsive" style="margin-top: 50px">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody id="body_table">
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script type="text/javascript">

    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "{{ url('api/produk') }}",
            dataType:'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                console.log(data);
                if(data.status == "success"){
                    var produks = data.data_produk
                    var html_element = "";
                    for (let i = 0; i < produks.length; i++) {
                        const element = produks[i];

                    html_element += '<tr>'+
                                    '<td>'+element.id+'</td>'+
                                    '<td>'+element.nama_kategori+'</td>'+
                                    '<td>'+element.nama_produk+'</td>'+
                                    '<td>'+element.harga+'</td>'+
                                    '<td>'+element.deskripsi+'</td>'+
                                    '<td>'+
                                        '<img src="{{ asset('/storage/produk/') }}/' + element.foto + '" width="50">'
                                    '</td>'+
                                '</tr>';
                   }

                   $('#body_table').html(html_element);

    
                } else {
                    html_element += '<tr>'+
                                        '<td colspan="6">Data Not Found!</td>'+
                                    '</tr>';
                }
    
                // location.reload();
            },
            error: function(data) {
                console.log(data);
            }
        });
    })
   
    </script>
@endpush
