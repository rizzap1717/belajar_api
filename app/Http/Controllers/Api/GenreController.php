<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genre = Genre::latest()->get();
        $response = [
            'succes' => true,
            'messages' => 'Daftar Genre',
            'data' => $genre,
        ];
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $genre = new Genre();
        $genre->nama_genre = $request->nama_genre;
        $genre->save();
        return response()->json([
            'success' => true,
            'message' => 'databer hasil di simpan',
        ], 200);
    }

    public function show($id)
    {
        $genre = Genre::find($id);
        if ($genre) {
            return response()->json([
                'success' => true,
                'message' => 'detail genre di simpan',
                'data' => $genre,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'detail genre di simpan',
                'data' => 'data tidak ditemukan',
            ], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        if ($genre) {
            $genre->nama_genre = $request->nama_genre;
            $genre->save();
            return response()->json([
                'success' => true,
                'message' => 'databer hasil di perbarui',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'detail genre di simpan',
                'data' => 'data tidak ditemukan',
            ], 404);
        }
    }
    public function destroy($id)
    {
        $genre = Genre::find($id);
        if ($genre) {
            $genre->delete();
            return response()->json([
                'success' => true,
                'message' => 'data ' . $genre->nama_genre . ' berhasil di hapus'
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'detail genre di simpan',
                'data' => 'data tidak ditemukan',
            ], 404);
        }
    }
}
