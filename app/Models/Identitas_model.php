<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Identitas_model extends Model
{
    protected $table = "identitas";
    protected $primaryKey = "Kode";
    public $timestamps = false;
    protected $keyType = 'string'; // Menentukan tipe data primary key perlu ini agar value Kode tidak 0
    public $incrementing = false; // Menonaktifkan auto-increment pada primary key

    // public function listing()
    // {
    // 	 $query = DB::table('identitas')
    //         ->select('*')
    //         ->orderBy('Kode','DESC')
    //         ->first();
    //     return $query;
    // }
   
}
