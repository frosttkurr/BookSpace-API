<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pinjam;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllPinjam()
    {
        return response()->json(Pinjam::all(), 200);
    }

    public function getDetailPinjam($id)
    {
        return response()->json(Pinjam::where('id', $id)->get(), 200);
    }

    public function insertPinjam(Request $request)
    {
        $pinjam = new Pinjam;
        $pinjam->nama = $request->nama;
        $pinjam->judul = $request->judul;
        $pinjam->alamat = $request->alamat;
        $pinjam->no_telpon = $request->no_telpon;
        $pinjam->tgl_pinjam = $request->tgl_pinjam;
        $pinjam->tgl_kembali = $request->tgl_kembali;
        $pinjam->status = 'DIPINJAM';
        $pinjam->save();
        return response([
            'statusAPI' => true,
            'message' => 'Peminjaman berhasil ditambah'
        ], 200);
    }

    public function updatePinjam(Request $request, $id)
    {
        $detail_pinjam = Pinjam::where('id', $id)->first();

        if ($detail_pinjam) 
        {
            $pinjam = Pinjam::find($id);
            $pinjam->tgl_kembali = $request->tgl_kembali;
            $pinjam->save();
            return response([
                'statusAPI' => true,
                'message' => 'Peminjaman berhasil diubah'
            ], 200);
        } else {
            return response([
                'status' => false,
                'message' => 'Data peminjaman tidak ditemukan'
            ], 404);
        }
    }

    public function returnPinjam(Request $request, $id)
    {
        $detail_pinjam = Pinjam::where('id', $id)->first();

        if ($detail_pinjam) 
        {
            $pinjam = Pinjam::find($id);
            $pinjam->status = 'DIKEMBALIKAN';
            $pinjam->save();
            return response([
                'statusAPI' => true,
                'message' => 'Peminjaman berhasil diubah'
            ], 200);
        } else {
            return response([
                'statusAPI' => false,
                'message' => 'Data peminjaman tidak ditemukan'
            ], 404);
        }
    }

    public function deletePinjam(Request $request, $id)
    {
        $detail_pinjam = Pinjam::where('id', $id)->first();

        if ($detail_pinjam) 
        {
            $pinjam = Pinjam::destroy($id);
            if($pinjam)
            {
                return response([
                    'statusAPI' => true,
                    'message' => 'Peminjaman berhasil dihapus'
                ], 200);
            }
        } else {
            return response([
                'statusAPI' => false,
                'message' => 'Data peminjaman tidak ditemukan'
            ], 404);
        }
    }
}
