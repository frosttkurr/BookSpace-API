<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllBuku()
    {
        return response()->json(Buku::all(), 200);
    }

    public function getBukuEdukasi()
    {
        return response()->json(Buku::where('kategori', 'EDUKASI')->get(), 200);
    }

    public function getBukuIlmiah()
    {
        return response()->json(Buku::where('kategori', 'ILMIAH')->get(), 200);
    }

    public function getBukuFiksi()
    {
        return response()->json(Buku::where('kategori', 'FIKSI')->get(), 200);
    }

    public function getBukuSejarah()
    {
        return response()->json(Buku::where('kategori', 'SEJARAH')->get(), 200);
    }    

    public function getBukuBisnis()
    {
        return response()->json(Buku::where('kategori', 'BISNIS')->get(), 200);
    }

    public function getBukuNovel()
    {
        return response()->json(Buku::where('kategori', 'NOVEL')->get(), 200);
    }

    public function getBukuMajalah()
    {
        return response()->json(Buku::where('kategori', 'MAJALAH')->get(), 200);
    }

    public function getDetailBuku($id)
    {
        return response()->json(Buku::where('id', $id)->get(), 200);
    }

    public function insertBuku(Request $request)
    {
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->kategori = $request->kategori;
        $buku->save();
        return response([
            'statusAPI' => true,
            'message' => 'Buku berhasil ditambah'
        ], 200);
    }

    public function updateBuku(Request $request, $id)
    {
        $detail_buku = Buku::where('id', $id)->first();

        if ($detail_buku) 
        {
            $buku = Buku::find($id);
            $buku->judul = $request->judul;
            $buku->kategori = $request->kategori;
            $buku->save();
            return response([
                'statusAPI' => true,
                'message' => 'Buku berhasil diubah'
            ], 200);
        } else {
            return response([
                'statusAPI' => false,
                'message' => 'Data buku tidak ditemukan'
            ], 404);
        }
    }

    public function deleteBuku(Request $request, $id)
    {
        $detail_buku = Buku::where('id', $id)->first();

        if ($detail_buku) 
        {
            $buku = Buku::destroy($id);
            if($buku)
            {
                return response([
                    'statusAPI' => true,
                    'message' => 'Buku berhasil dihapus'
                ], 200);
            }
        } else {
            return response([
                'statusAPI' => false,
                'message' => 'Data buku tidak ditemukan'
            ], 404);
        }
    }
}
