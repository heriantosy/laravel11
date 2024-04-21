<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Identitas_model;
use App\Helpers\helpers;

class Identitas extends Controller
{
    public function index()
    {
        
    	//$identitas = Identitas_model::where('Kode', 'HTP')->first();
        $identitas = DB::table('identitas')->where('Kode', 'HTP')->first();
        $data = [
            'title'   => 'Data Identitas',
            'site'    => $identitas,
            'content' => 'admin/identitas/index'
        ];
        return view('admin/layout/wrapper', $data);
    }

    public function edit_identitas()
    {
        $identitas = Identitas_model::where('Kode', 'HTP')->first();
        //$identitas = DB::table('identitas')->where('Kode', 'HTP')->first();
        $data = [
            'title'     => 'Edit Identitas',
            'identitas' => $identitas,
            'content'   => 'admin/identitas/edit_identitas'
        ];
        return view('admin/layout/wrapper', $data);
    }

    public function edit_identitas_simpan(Request $request)
    {
        $identitas = Identitas_model::findOrFail($request->id);

        $rules = [
            'Nama'    => 'required|string',
            'Alamat1' => 'nullable|string',
            'Logo'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi tambahan untuk tipe file dan ukuran
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('Logo')) {
            $file = $request->file('Logo');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = 'public/identitas/';

            if ($identitas->Logo) {
                Storage::delete($path . $identitas->Logo);
            }

            $file->storeAs($path, $fileName);
            $identitas->Logo = $fileName;
        }

        $identitas->Nama = $request->Nama;
        $identitas->Alamat1 = $request->Alamat1;
        $identitas->save(); //update not good for security

        return redirect()->back()->withSuccess('Identitas berhasil diperbarui.');
    }
}