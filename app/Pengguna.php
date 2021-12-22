<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengguna extends Model
{
    use SoftDeletes;
    
    protected $table = 'pengguna';
    protected $fillable = ['nama_lengkap', 'alamat', 'jenis_kelamin', 'no_telpon', 'email', 'username', 'password', 'minat_membaca','deleted_at'];
    protected $primaryKey = 'id'; 
}
