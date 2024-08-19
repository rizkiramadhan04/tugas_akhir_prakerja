<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_produk = Post::select('kategoris.nama_kategori as nama_kategori', 'produks.*')
                ->leftJoin('produks', 'posts.kategori_id', '=', 'produks.kategori_id')
                ->leftJoin('kategoris', 'produks.kategori_id', '=', 'kategoris.id')
                ->orderBy('posts.created_at', 'desc')
                ->get();

        if (count($data_produk) > 0) {
            $response = [
                'status' => 'success',
                'data_produk' => $data_produk,
            ];
        } else {
            $response = [
                'status' => 'failed',
                'data_produk' => null,
            ];
        }

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
       
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
