<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\{ProdukModel, JenisModel, TransaksiModel};

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sum = DB::table('transaksi')->sum('harga_transaksi');
        $produk = DB::table('transaksi')
        ->join('produk', 'transaksi.id_produk', '=', 'produk.id_produk')
        ->orderByDesc('transaksi.tanggal_transaksi')
        ->get();
        return view('dashboard.transaksi.list', ['produk' => $produk], ['sum' => $sum]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = TransaksiModel::kode();
        $transaksi = DB::table('produk')
        ->where('jumlah_produk', '>', '0')
        ->get();
        return view('dashboard.transaksi.tambah',['transaksi' => $transaksi], ['kode' => $kode]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = new ProdukModel;
        $id_produk = $request->input('id_produk');
        $kode = $request->input('kode_transaksi');
        $data = $this->validate($request,[
            'kode_transaksi'        => 'required|unique:transaksi,kode_transaksi',
            'id_produk'             => 'required',
            'jumlah_transaksi'      => 'required',
            'harga_transaksi'       => 'required',
            'tanggal_transaksi'     => 'required',
        ]);
        DB::table('transaksi')->insert($data);
        $produk->where('id_produk', '=', $id_produk)->decrement('jumlah_produk', $request->jumlah_transaksi);

        $request->session()->flash('kode', $kode);
        return redirect('transaksi');
    }
    public function getData(Request $request)
    {
        $response = DB::table('produk')
        ->where('id_produk', '=', $request->input('id'))
        ->get();

        return response()->json($response);
    }

    public function hitung(Request $request) {
        $validator = Validator::make($request->all(), [
            'jumlah' => 'required|numeric|min:1',
            'id_product' => 'required|exists:produk,id_produk'
        ]);

        if($validator->fails()) {
            return ['status' => false, 'msg' => $validator->errors()->first()];
        }

        $tbl_product = ProdukModel::find($request->id_product);
        if($tbl_product == null) {
            return ['status' => false, 'msg' => "Produk tidak ditemukan"];
        }

        $hitung = $request->jumlah * $tbl_product->harga_jual;
        return ['status' => true, 'hitung' => $hitung, 'produk' => $tbl_product ];
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_transaksi)
    {
        $transaksi = DB::table('transaksi')
        ->where('transaksi.id_transaksi', $id_transaksi)
        ->first();

        $produk = DB::table('produk')
        ->get();

        if(!$produk){
            abort(404);
        }
        return view('dashboard.transaksi.edit', ['produk' => $produk], ['transaksi' => $transaksi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_transaksi)
    {
        $data = $this->validate($request,[
            'id_produk'             => 'required',
            'jumlah_transaksi'      => 'required',
            'harga_transaksi'       => 'required',
            'tanggal_transaksi'     => 'required',
        ]);
        DB::table('transaksi')
        ->where('transaksi.id_transaksi',$id_transaksi)
        ->update($data);

        return redirect('transaksi')
        ->With('msg_transaksi', 'Data Transaksi Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_transaksi)
    {
        $delete = DB::table('transaksi')
        ->where('id_transaksi',$id_transaksi)
        ->delete();

        $kode = DB::table('transaksi')
        ->where('id_transaksi', '=', $id_transaksi)
        ->get('kode_transaksi');

        if($delete) {
            return redirect('transaksi')->With('msg_transaksi', 'Data Transaksi Berhasil Dihapus');
        }
    }
}
