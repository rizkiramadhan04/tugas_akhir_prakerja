<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::with('kategori')->get();

        return view('admin.post.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.post.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        Post::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori_id' => $request->kategori_id,
            'tanggal_dibuat' => Carbon::now(),
        ]);
        return redirect('post')->with('success', 'Data Berhasil diinput!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Post::find($id);
        $kategori = Kategori::all();
        return view('admin.post.edit', compact('data', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);
        Post::find($id)->update([
            'judul' => $request->input('judul'),
            'isi' => $request->input('isi'),
            'kategori_id' => $request->input('kategori_id'),
            'tanggal_dibuat' => Carbon::now()
        ]);
        return redirect('post')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::find($id)->delete();
        return redirect('post')->with('success', 'Data berhasil dihapus');
    }
}
