<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategoridownload_model extends Model
{
   use HasFactory;
   
   protected $table="kategori_download";
   protected $primaryKey="id_kategori_download";
   public $timestamps = false;
}
