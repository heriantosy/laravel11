<?php

namespace App\Http\Controllers\Admin;

use App\Models\AgendaModel;
use App\Models\Mahasiswa_model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; //add this

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Mahasiswa_model::limit(25)->orderby('MhswID', 'DESC')->get();
        //return view ('agenda.index', compact('agenda'));
        $data = [
            'title'      => 'LIST DATA',
            'agenda'     => $agenda,
            'content'    => 'admin/agenda/index'
        ];
        return view('admin/layout/wrapper', $data);
    }

    public function create()
    {
        // return view ('agenda.add');
        $data = [
            'title'      => 'ADD DATA',
            'content'    => 'admin/agenda/add'
        ];
        return view('admin/layout/wrapper', $data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'judul' => 'required',
            ]);       
       $agenda = new AgendaModel();
       $agenda->judul = $request->judul;
       $agenda->tgl_mulai = date('Y-m-d');
       $agenda->tgl_selesai = date('Y-m-d');
       $agenda->save();

       return redirect()->route('agenda.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
       $agenda = AgendaModel::findOrFail($id);
      return view('agenda.edit', compact('agenda'));
    }

    public function update(Request $request, string $id)
    {
        $agenda = AgendaModel::findOrFail($id);
        $agenda->judul          = $request->judul;
        $agenda->tgl_mulai      = date('Y-m-d');
        $agenda->tgl_selesai    = date('Y-m-d');
        $agenda->save();
        return redirect()->route('agenda.index');
    }

    public function destroy(string $id)
    {
        $agenda = AgendaModel::findOrFail($id);
        $agenda->delete();
        return redirect()->route('agenda.index');
    }
}
