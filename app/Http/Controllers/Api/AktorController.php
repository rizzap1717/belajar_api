<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aktor;
use Illuminate\Http\Request;

class AktorController extends Controller
{
    public function index()
    {
        $aktor = Aktor::latest()->get();
        $response = [
            'succes' => true,
            'messages' => 'Daftar aktor',
            'data' => $aktor,
        ];
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $aktor = new Aktor();
        $aktor->nama_aktor = $request->nama_aktor;
        $aktor->bio = $request->bio;
        $aktor->save();
        return response()->json([
            'success' => true,
            'message' => 'databer hasil di simpan',
        ], 200);
    }

    public function show($id)
    {
        $aktor = Aktor::find($id);
        if ($aktor) {
            return response()->json([
                'success' => true,
                'message' => 'detail aktor di simpan',
                'data' => $aktor,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'detail aktor di simpan',
                'data' => 'data tidak ditemukan',
            ], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $aktor = Aktor::find($id);
        if ($aktor) {
            $aktor->nama_aktor = $request->nama_aktor;
            $aktor->bio = $request->bio;
            $aktor->save();
            return response()->json([
                'success' => true,
                'message' => 'databer hasil di perbarui',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'detail aktor di simpan',
                'data' => 'data tidak ditemukan',
            ], 404);
        }
    }
    public function destroy($id)
    {
        $aktor = Aktor::find($id);
        if ($aktor) {
            $aktor->delete();
            return response()->json([
                'success' => true,
                'message' => 'data ' . $aktor->nama_aktor, $aktor->bio . ' berhasil di hapus'
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'detail aktor di simpan',
                'data' => 'data tidak ditemukan',
            ], 404);
        }
    }
}
