<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen_model;
use App\Models\Identitas_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Konfigurasi_model;
use App\Models\Mahasiswa_model;
use App\Models\Pmb_model;
use App\Models\Tahun_model;
use App\Models\Tahunnormal_model;
use App\Models\User;
use Image;
use PDF;
use Carbon\Carbon;


class Dasbor extends Controller
{
    public function index()
    {
        $tahun = Tahun_model::select('TahunID', 'ProdiID', 'ProgramID', 'Nama', 'NA')
                   ->orderBy('Nama', 'ASC')
                   ->where('NA', 'N')
                   ->first();
        $site = Identitas_model::where('NA', 'N')->first();

        $user    = User::find(auth()->id());
        $unit    = $user->unit;
        $program ='REG A';

        $mhs = Mahasiswa_model::where('NA','=','N')->count();
        $dosen = Dosen_model::where('NA','=','N')->count();
    
        /** PIE CHART -------------------------------------------------------------------------------- */
        $rows = Mahasiswa_model::select('mhsw.ProdiID', 'prodi.Nama as NamaProdi')
        ->selectRaw('COUNT(*) AS total')
        ->join('prodi', 'prodi.ProdiID', '=', 'mhsw.ProdiID')
        ->where('prodi.NA', '=', 'N')
        ->groupBy('mhsw.ProdiID')
        ->get();
    
        $pie = [];
        foreach ($rows as $row) {
            $pie[] = [
                'name'  => $row->NamaProdi,
                'y'     => $row->total,
            ];
        }


        /** LINE CHART -------------------------------------------------------------------------------- */
        $rows = Mahasiswa_model::select('mhsw.ProdiID', 'prodi.Nama as NamaProdi')
        ->selectRaw('COUNT(*) AS total')
        ->join('prodi', 'prodi.ProdiID', '=', 'mhsw.ProdiID')
        ->where('prodi.NA', 'N')
        // ->where('mhsw.NA', 'N')
        // ->where(function($query) {
        //     $query->whereBetween(DB::raw('left(mhsw.MhswID,2)'), [17, 24]);
        // })
        ->groupBy('mhsw.ProdiID')
        ->get();
    
        $line = [];
        foreach ($rows as $row) {
            $line['categories'][] = $row->NamaProdi;
            $line['data'][] = $row->total * 1;
        }
    



        /** COLUMN CHART -------------------------------------------------------------------------------- */
        $rows = Pmb_model::selectRaw('PMBID,ProdiID, YEAR(PMBPeriodID) AS Periode, COUNT(*) AS total')
        ->groupByRaw('ProdiID, YEAR(PMBPeriodID)')->get();

        $column = [];
        foreach ($rows as $row) {
            $column['categories'][$row->ProdiID] = $row->ProdiID;
            $column['series'][$row->ProdiID]['name'] = $row->ProdiID;
            $column['series'][$row->ProdiID]['data'][$row->Periode] = $row->total * 1;
        }
        foreach ($column['series'] as $key => $val) {
            $column['series'][$key]['data'] = array_values($val['data']);
        }
        $column['categories'] = array_values($column['categories']);
        $column['series'] = array_values($column['series']);
                
    
        $data = [
            'title'     => 'SIAKAD ' . $site->Nama,
            'site'      => $site,
            'tahun'     => $tahun,
            'pie'       => $pie,
            'line'      => $line,
            'column'    => $column,
            'program'   => $program,
            'unit'      => $unit,
            'mhs'      => $mhs,
            'dosen'      => $dosen,
            'content'   => 'admin/dasbor/index'
        ];
        return view('admin/layout/wrapper', $data);
    }
        
    

    public function dasbordsn(){
        $mysite = new Identitas_model();
		$site 	= $mysite->listing();
       
		$data = array(  'title'     => $site->Nama.' - '.$site->NoAkta,
                        'site'      => $site,
                        'content'   => 'admin/dasbor/dasbordsn'
                    );
        return view('admin/layout/wrapper',$data);
    }

    public function dasbormhs(){
        $mysite = new Identitas_model();
		$site 	= $mysite->listing();
       
		$data = array(  'title'     => $site->Nama.' - '.$site->NoAkta,
                        'site'      => $site,
                        'content'   => 'admin/dasbor/dasbormhs'
                    );
        return view('admin/layout/wrapper',$data);
    }
}
