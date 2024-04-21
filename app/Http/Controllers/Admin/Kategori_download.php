<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Kategoridownload_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Kategori_download extends Controller
{
    public function index()
    {    	
		$kategori_download 	= Kategoridownload_model::orderBy('urutan','ASC')->get();

		$data = array(  'title'             => 'Kategori Download',
						'kategori_download'	=> $kategori_download,
                        'content'           => 'admin/kategori_download/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    public function tambah(Request $request)
    {
    	
    	request()->validate([
					        'nama_kategori_download' => 'required|unique:kategori_download',
					        'urutan' 		       => 'required',
					        ]);
    	$slug_kategori_download = Str::slug($request->nama_kategori_download, '-');
        Kategoridownload_model::insert([
            'nama_kategori_download'    => $request->nama_kategori_download,
            'slug_kategori_download'	=> $slug_kategori_download,
            'urutan'   		            => $request->urutan,
            'keterangan'                => $request->keterangan
        ]);
        return redirect('admin/kategori_download')->with(['sukses' => 'Data telah ditambah']);
    }

    public function edit(Request $request)
    {   	
    	request()->validate([
					        'nama_kategori_download' => 'required',
					        'urutan'               => 'required',
					        ]);
    	$slug_kategori_download = Str::slug($request->nama_kategori_download, '-');
        Kategoridownload_model::where('id_kategori_download','=',$request->id_kategori_download)->update([
            'nama_kategori_download'  => $request->nama_kategori_download,
            'slug_kategori_download'	=> $slug_kategori_download,
            'urutan'                => $request->urutan,
            'keterangan'               => $request->keterangan
        ]);
        return redirect('admin/kategori_download')->with(['sukses' => 'Data telah diupdate']);
    }

    public function delete($id_kategori_download)
    {  	
    	Kategoridownload_model::where('id_kategori_download','=',$id_kategori_download)->delete();
    	return redirect('admin/kategori_download')->with(['sukses' => 'Data telah dihapus']);
    }
}
