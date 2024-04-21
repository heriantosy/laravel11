<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Identitas_model;
use App\Models\Konfigurasi_model;
use App\Models\Mahasiswa_model;
use App\Models\OrderDetail;
use App\Models\Pmb_model;
use App\Models\Prodi_model;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Transaction;


class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::where('roles', 'USER')->count();
        $revenue = Transaction::where('status', '!=', 'PENDING')->sum('total_price');
        $transaction = Transaction::count();

        // Data pendapatan harian dari transaksi
        $revenueDaily = Transaction::selectRaw('DATE(created_at) as date, SUM(total_price) as revenue')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // Ubah format data agar sesuai dengan format yang dibutuhkan oleh Chart.js
        $revenueData = [];
        foreach ($revenueDaily as $data) {
            $revenueData['labels'][] = $data->date;
            $revenueData['revenue'][] = $data->revenue;
        }
        return view('pages.admin.dashboard', [
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction,
            'revenueData' => $revenueData,
        ]);
    }

   

    public function dashboard()
    {
        
        /** PIE CHART -------------------------------------------------------------------------------- */
        // $rows = Product::selectRaw('category_name, COUNT(*) AS total')
        //     ->join('categories', 'categories.category_id', 'products.category_id')
        //     ->groupBy('category_name')->get();
        $rows = Mahasiswa_model::selectRaw('MhswID,ProdiID, COUNT(*) AS total')
            ->groupBy('ProdiID')->get();
        $pie = [];
        foreach ($rows as $row) {
            $pie[] = [
                'name' =>  $row->ProdiID,
                'y' =>  $row->total,
            ];
        }
        
        // $rows = OrderDetail::selectRaw('MAX(order_date) AS order_date, SUM(quantity) AS total')
        //     ->join('orders', 'orders.order_id', 'order_details.order_id')
        //     ->groupByRaw('YEAR(order_date), MONTH(order_date)')->get();
        $rows = Mahasiswa_model::selectRaw('MhswID,ProdiID, COUNT(*) AS total')
        ->groupBy('ProdiID')->get();
        
        /** LINE CHART -------------------------------------------------------------------------------- */ 
        $line = [];
        foreach ($rows as $row) {
            $line['categories'][] = date('M-Y', strtotime($row->TglMasuk));
            $line['data'][] = $row->total * 1;
        }



        // $rows = OrderDetail::selectRaw('category_name, YEAR(order_date) AS order_date, SUM(quantity) AS total')
        //     ->join('orders', 'orders.order_id', 'order_details.order_id')
        //     ->join('products', 'products.product_id', 'order_details.product_id')
        //     ->join('categories', 'categories.category_id', 'products.category_id')
        //     ->groupByRaw('category_name, YEAR(order_date)')->get();
        $rows = Pmb_model::selectRaw('PMBID,ProdiID, YEAR(PMBPeriodID) AS Periode, COUNT(*) AS total')
                ->groupByRaw('ProdiID, YEAR(PMBPeriodID)')->get();

        /** PIE CHART --------------------------------------------------------------------------------*/
        $column = [];
        foreach ($rows as $row) {
            $column['categories'][$row->ProdiID] = $row->Periode;
            $column['series'][$row->ProdiID]['name'] = $row->ProdiID;
            $column['series'][$row->ProdiID]['data'][$row->Periode] = $row->total * 1;
        }
        foreach ($column['series'] as $key => $val) {
            $column['series'][$key]['data'] = array_values($val['data']);
        }
        $column['categories'] = array_values($column['categories']);
        $column['series'] = array_values($column['series']);
        //return view('admin.laporan.dashboard', compact('pie', 'line')); //, 'column'
       
		$site 	= Identitas_model::first();
       
		$data = array(  'title'     => 'SIAKAD',
                        'pie'       => $pie,
                        'line'       => $line,
                        'column'       => $column,
                        'content'   => 'admin/lapakademik/dashboard'
                    );
        return view('admin/layout/wrapper',$data);
    }
}
