<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tahun_model extends Model
{
	protected $table        = "tahun";
    protected $primaryKey 	= 'TahunID';
    public $timestamps      = false;
    protected $keyType      = 'string'; // Menentukan tipe data primary key perlu ini agar value TahunID tidak 0
    public $incrementing    = false; // Menonaktifkan auto-increment pada primary key

   public function tahun($programplh, $prodiplh){
    $query = DB::table('tahun')
        ->select('tahun.*')
        ->where('ProgramID',$programplh)
        ->where('ProdiID', $prodiplh)
        ->orderBy('TahunID', 'DESC')
        ->get();
    return $query;
   }
}
