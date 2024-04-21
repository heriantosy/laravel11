<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Download_model extends Model
{
	protected $table 		= "download";
	protected $primaryKey 	= 'id_download';
    public $timestamps      = false;

    public function semua()
    {
        $query = Download_model::join('kategori_download', 'kategori_download.id_kategori_download', '=', 'download.id_kategori_download','LEFT')
            ->select('download.*', 'kategori_download.slug_kategori_download', 'kategori_download.nama_kategori_download')
            ->orderBy('download.id_download','DESC')
            ->get();
        return $query;
    }

    public function cari($keywords)
    {
        $query = Download_model::join('kategori_download', 'kategori_download.id_kategori_download', '=', 'download.id_kategori_download','LEFT')
            ->select('download.*', 'kategori_download.slug_kategori_download', 'kategori_download.nama_kategori_download')
            ->where('download.judul_download', 'LIKE', "%{$keywords}%") 
            ->orWhere('download.isi', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_download','DESC')
            ->get();
        return $query;
    }

    public function listing()
    {
    	$query = Download_model::join('kategori_download', 'kategori_download.id_kategori_download', '=', 'download.id_kategori_download','LEFT')
            ->select('download.*', 'kategori_download.slug_kategori_download', 'kategori_download.nama_kategori_download')
            ->where('status_download','Publish')
            ->orderBy('id_download','DESC')
            ->get();
        return $query;
    }

    public function kategori_download($id_kategori_download)
    {
        $query = Download_model::join('kategori_download', 'kategori_download.id_kategori_download', '=', 'download.id_kategori_download','LEFT')
            ->select('download.*', 'kategori_download.slug_kategori_download', 'kategori_download.nama_kategori_download')
            ->where(array(  'download.status_download'         => 'Publish',
                            'download.id_kategori_download'    => $id_kategori_download))
            ->orderBy('id_download','DESC')
            ->get();
        return $query;
    }

    public function all_kategori_download($id_kategori_download)
    {
        $query = Download_model::join('kategori_download', 'kategori_download.id_kategori_download', '=', 'download.id_kategori_download','LEFT')
            ->select('download.*', 'kategori_download.slug_kategori_download', 'kategori_download.nama_kategori_download')
            ->where(array(  'download.id_kategori_download'    => $id_kategori_download))
            ->orderBy('id_download','DESC')
            ->get();
        return $query;
    }

    public function status_download($status_download)
    {
        $query = Download_model::join('kategori_download', 'kategori_download.id_kategori_download', '=', 'download.id_kategori_download','LEFT')
            ->select('download.*', 'kategori_download.slug_kategori_download', 'kategori_download.nama_kategori_download')
            ->where(array(  'download.status_download'         => $status_download))
            ->orderBy('id_download','DESC')
            ->get();
        return $query;
    }

    public function detail_kategori_download($id_kategori_download)
    {
        $query = Download_model::join('kategori_download', 'kategori_download.id_kategori_download', '=', 'download.id_kategori_download','LEFT')
            ->select('download.*', 'kategori_download.slug_kategori_download', 'kategori_download.nama_kategori_download')
            ->where(array(  'download.status_download'         => 'Publish',
                            'download.id_kategori_download'    => $id_kategori_download))
            ->orderBy('id_download','DESC')
            ->first();
        return $query;
    }

    public function detail_slug_kategori_download($slug_kategori_download)
    {
        $query = Download_model::join('kategori_download', 'kategori_download.id_kategori_download', '=', 'download.id_kategori_download','LEFT')
            ->select('download.*', 'kategori_download.slug_kategori_download', 'kategori_download.nama_kategori_download')
            ->where(array(  'download.status_download'                  => 'Publish',
                            'kategori_download.slug_kategori_download'  => $slug_kategori_download))
            ->orderBy('id_download','DESC')
            ->first();
        return $query;
    }

    public function slug_kategori_download($slug_kategori_download)
    {
        $query = Download_model::join('kategori_download', 'kategori_download.id_kategori_download', '=', 'download.id_kategori_download','LEFT')
            ->select('download.*', 'kategori_download.slug_kategori_download', 'kategori_download.nama_kategori_download')
            ->where(array(  'download.status_download'                  => 'Publish',
                            'kategori_download.slug_kategori_download'  => $slug_kategori_download))
            ->orderBy('id_download','DESC')
            ->get();
        return $query;
    }

    public function read($slug_download)
    {
        $query = Download_model::join('kategori_download', 'kategori_download.id_kategori_download', '=', 'download.id_kategori_download','LEFT')
            ->select('download.*', 'kategori_download.slug_kategori_download', 'kategori_download.nama_kategori_download')
            ->where('download.slug_download',$slug_download)
            ->orderBy('id_download','DESC')
            ->first();
        return $query;
    }

    public function detail($id_download)
    {
        $query = Download_model::join('kategori_download', 'kategori_download.id_kategori_download', '=', 'download.id_kategori_download','LEFT')
            ->select('download.*', 'kategori_download.slug_kategori_download', 'kategori_download.nama_kategori_download')
            ->where('download.id_download',$id_download)
            ->orderBy('id_download','DESC')
            ->first();
        return $query;
    }

    public function gambar($id_download)
    {
        $query = DB::table('gambar_download')
            ->select('*')
            ->where('gambar_download.id_download',$id_download)
            ->orderBy('id_download','DESC')
            ->get();
        return $query;
    }
}
