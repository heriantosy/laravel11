<?php

namespace App\Http\Controllers;

use App\Models\AgendaModel;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = AgendaModel::get();
        return view ('agenda.index', compact('agenda'));
    }

    public function create()
    {
        return view ('agenda.add');
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
