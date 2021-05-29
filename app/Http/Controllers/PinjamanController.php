<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\{ProdukModel, JenisModel, TransaksiModel, PeminjamanModel};

class PinjamanController extends Controller
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
        $data = DB::table('pinjaman')
        ->join('produk', 'pinjaman.id_produk', '=', 'produk.id_produk')
        ->orderBy('pinjaman.nama_peminjam', 'asc')
        ->get();

        return view('dashboard.pinjaman.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pinjaman = DB::table('produk')
        ->get();

        return view('dashboard.pinjaman.tambah', compact('pinjaman'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama = $request->input('nama_peminjam');
        $data = $this->validate($request,[
            'nama_peminjam'         => 'required',
            'id_produk'             => 'required',
            'jumlah_barang'         => 'required|numeric',
            'tanggal_pinjam'        => 'required',
        ]);
        DB::table('pinjaman')->insert($data);

        $request->session()->flash('nama', $nama);
        return redirect('pinjaman');
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
    public function edit($id_pinjaman)
    {
        $pinjaman = DB::table('pinjaman')
        ->where('pinjaman.id_pinjaman', $id_pinjaman)
        ->first();

        $produk = DB::table('produk')
        ->get();

        if(!$produk){
            abort(404);
        }
        return view('dashboard.pinjaman.edit', ['produk' => $produk], ['pinjaman' => $pinjaman]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pinjaman)
    {
        $data = $this->validate($request,[
            'nama_peminjam'         => 'required',
            'id_produk'             => 'required',
            'jumlah_barang'         => 'required|numeric',
            'tanggal_pinjam'        => 'required',
        ]);
        DB::table('pinjaman')
        ->where('pinjaman.id_pinjaman',$id_pinjaman)
        ->update($data);

        return redirect('pinjaman')
        ->With('msg_Peminjam', 'Data Pinjaman Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pinjaman)
    {
        $delete = DB::table('pinjaman')
        ->where('id_pinjaman',$id_pinjaman)
        ->delete();

        $kode = DB::table('pinjaman')
        ->join('produk', 'pinjaman.id_produk', '=', 'produk.id_produk')
        ->where('id_pinjaman', '=', $id_pinjaman)
        ->get();

        if($delete) {
            return redirect('pinjaman')->With('msg_Peminjam', 'Data Peminjam Berhasil Dihapus');
        }
    }
}
