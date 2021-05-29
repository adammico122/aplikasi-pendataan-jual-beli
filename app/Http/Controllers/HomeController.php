<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\{JenisModel, PeminjamanModel, ProdukModel, RefillModel, TransaksiModel};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = date('Y-m-d',strtotime('+0 days'));
        $kemarin = date('Y-m-d',strtotime('-1 days'));
        $bulanIni = date('Y-m-d',strtotime('+0 month'));
        $bulanLalu = date('Y-m-d',strtotime('now -1 month'));
        $data = [ 'transaksi'               => TransaksiModel::where('tanggal_transaksi', '=', $today)->count(),
                'transaksi_untung'          => TransaksiModel::where('tanggal_transaksi', '=', $today)->sum('harga_transaksi'),

                'transaksi_kemarin'         => TransaksiModel::where('tanggal_transaksi', '=', $kemarin)->count(),
                'transaksi_kemarin_untung'  => TransaksiModel::where('tanggal_transaksi', '=', $kemarin)->sum('harga_transaksi'),

                'transaksi_bulan_ini'       => TransaksiModel::where('tanggal_transaksi', '=', $bulanIni)->count(),
                'untung_bulan_ini'          => TransaksiModel::where('tanggal_transaksi', '=', $bulanIni)->sum('harga_transaksi'),

                'transaksi_bulan_lalu'      => TransaksiModel::where('tanggal_transaksi', '=', $bulanLalu)->count(),
                'untung_bulan_lalu'         => TransaksiModel::where('tanggal_transaksi', '=', $bulanLalu)->sum('harga_transaksi'),

                // -- Box Baris Kedua Index -- //

                'keseluruhan_hasil'         => TransaksiModel::sum('harga_transaksi'),
    ];
        return view('dashboard.index', $data);
    }
}
