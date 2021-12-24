<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;
use Illuminate\Support\Str;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPengguna($id)
    {
        return response()->json(Pengguna::where('id', $id)->get(), 200);
    }

    public function checkUsernameAndPassword(Request $request)
    {
        $username = $request->username;
        $password = sha1($request->password);
        $data = Pengguna::where('username', $username)->where('password', $password)->get();
        
        if(!empty($data)) {
            return response([
                'statusAPI' => true,
                'message' => 'Username dan password sesuai',
                'data' => $data
            ], 200);
        } else {
            return response([
                'statusAPI' => false,
                'message' => 'Username atau password salah'
            ], 404);
        }
    }

    public function insertPengguna(Request $request)
    {
        $username = $request->username;
        $data = Pengguna::where('username', $username)->first();

        if (!$data) {
            $pengguna = new Pengguna;
            $pengguna->nama_lengkap = $request->nama_lengkap;
            $pengguna->alamat = $request->alamat;
            $pengguna->jenis_kelamin = $request->jenis_kelamin;
            $pengguna->no_telpon = $request->no_telpon;
            $pengguna->email = $request->email;
            $pengguna->username = $request->username;
            $pengguna->password = sha1($request->password);
            $pengguna->minat_membaca = $request->minat_membaca;
            $pengguna->token = Str::orderedUuid()->getHex();
            $pengguna->save();
            return response([
                'statusAPI' => true,
                'message' => 'Pengguna berhasil ditambah'
            ], 200);
        } else {
            return response([
                'statusAPI' => false,
                'message' => 'Pengguna sudah ada'
            ], 200);
        }
    }

    public function deletePengguna($id)
    {
        $detail_pengguna = Pengguna::where('id', $id)->first();

        if ($detail_pengguna) 
        {
            $detail_pengguna->delete();
            return response([
                'statusAPI' => true,
                'message' => 'Pengguna berhasil dihapus'
            ], 200);
        } else {
            return response([
                'statusAPI' => false,
                'message' => 'Data pengguna tidak ditemukan'
            ], 404);
        }
    }
}
