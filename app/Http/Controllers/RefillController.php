<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\{RefillModel, ProdukModel, JenisModel, TransaksiModel};

class RefillController extends Controller
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
        $refill = DB::table('refill')
        ->join('produk', 'refill.id_produk', '=', 'produk.id_produk')
        ->orderByDesc('refill.created_at')
        ->get();

        return view('dashboard.refill.list', compact('refill'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = DB::table('produk')
        ->get();

        return view('dashboard.refill.tambah', compact('produk'));
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
        $harga = $request->input('harga_refill');
        $data = $this->validate($request,[
            'id_produk'         => 'required',
            'jumlah_refill'     => 'required',
            'tanggal_refill'    => 'required',
            'harga_refill'      => 'required',
        ]);
        DB::table('refill')->insert($data);
        $produk->where('id_produk', '=', $id_produk)->increment('jumlah_produk', $request->jumlah_refill);

        $request->session()->flash('harga', $harga);

        return redirect('refill');
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
    public function edit($id_refill)
    {
        $refill = DB::table('refill')
        ->where('refill.id_refill', $id_refill)
        ->first();

        $produk = DB::table('produk')
        ->get();

        if(!$produk){
            abort(404);
        }
        return view('dashboard.refill.edit', ['produk' => $produk], ['refill' => $refill]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_refill)
    {
        $data = $this->validate($request,[
            'id_produk'         => 'required',
            'jumlah_refill'     => 'required|numeric',
            'tanggal_refill'    => 'required',
            'harga_refill'      => 'required|numeric',
        ]);
        DB::table('refill')
        ->where('refill.id_refill',$id_refill)
        ->update($data);

        return redirect('produk')
        ->With('msg_Refill', 'Data Refill/Isi Ulang Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_refill)
    {
        $delete = DB::table('refill')
        ->where('id_refill',$id_refill)
        ->delete();

        $kode = DB::table('refill')
        ->join('produk', 'refill.id_produk', '=', 'produk.id_produk')
        ->where('id_refill', '=', $id_refill)
        ->get();

        if($delete) {
            return redirect('refill')->With('msg_Refill', 'Data Refill/Isi Ulang Berhasil Dihapus');
        }
    }
}
