<?php
namespace App\Http\Controllers;
use App\Models\Hari_model;
use Illuminate\Http\Request;

class HariController extends Controller
{
    public function index()
    {
        $hari = Hari_model::get();
        //return view ('hari/index', compact('hari'));
        $data = [  
            'title'     => 'Master Hari',
            'hari'      => $hari,
            'content'   => 'admin/hari/index'
            ];
        return view('admin/layout/wrapper',$data);
    }

    public function create()
    {
        $data = [  
            'title'     => 'Tambah Hari',
            'content'   => 'admin/hari/add'
            ];
        return view('admin/layout/wrapper',$data);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'img'        => 'required|image|mimes:jpeg,jpg,png|max:2048',
        //     'NamaHari'   => 'required'
        // ]);
        // $image = $request->file('img');
        // $image->storeAs('public/img', $image->hashName());

        $hari = new Hari_model();
        $hari->NamaHari = $request->NamaHari;
        // $hari->img      = $image->hashName();
        $hari->save();
        return redirect('hari');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $hari = Hari_model::find($id);
        $data = [  
            'title'     => 'Edit Hari',
            'hari'      => $hari,
            'content'   => 'admin/hari/edit'
            ];
        return view('admin/layout/wrapper',$data);
    }

    public function update(Request $request, string $id)
    {
        $hari = Hari_model::find($id);
        $hari->NamaHari = $request->NamaHari;
        $hari->save();
        return redirect('hari');
    }

    public function destroy(string $id)
    {
        $product = Hari_model::findOrFail($id);
        $product->delete();
        return redirect()->route('hari.index')->with(['success' => 'Data Berhasil Dihapus!']);        
    }
}
