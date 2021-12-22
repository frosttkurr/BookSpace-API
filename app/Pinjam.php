<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    protected $table = 'pinjam';
    protected $fillable = ['nama', 'judul', 'alamat', 'no_telpon', 'tgl_pinjam', 'tgl_kembali', 'status'];
    protected $primaryKey = 'id';
}
