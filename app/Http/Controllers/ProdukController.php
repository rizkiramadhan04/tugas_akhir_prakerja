<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Produk::with('kategori')->get();

        return view('admin.produk.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.produk.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama_produk' => 'required',
            'file' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
                $filename = 'Produk' . time() . '_' . $file->getClientOriginalName();
                $file->storeAs('/produk', $filename, 'public');
        }

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'foto' => $filename,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
        ]);
        return redirect('produk')->with('success', 'Data Berhasil diinput!');
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
        $data = Produk::find($id);
        $kategori = Kategori::all();
        return view('admin.produk.edit', compact('data', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'nama_produk' => 'required',
            'file' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
                $filename = 'Produk' . time() . '_' . $file->getClientOriginalName();
                $file->storeAs('/produk', $filename, 'public');
        }

        Produk::find($id)->update([
            'nama_produk' => $request->nama_produk,
            'foto' => $filename,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
        ]);
        return redirect('produk')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produk::find($id)->delete();
        return redirect('produk')->with('success', 'Data berhasil dihapus');
    }
}
