<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Konfigurasi_model extends Model
{
    protected $table="konfigurasi";
    protected $primaryKey="id_konfigurasi";
    public $timestamps      = false;
    public function listing()
    {
    	 $query = DB::table('konfigurasi')
            ->select('*')
            ->orderBy('id_konfigurasi','DESC')
            ->first();
        return $query;
    }
}
