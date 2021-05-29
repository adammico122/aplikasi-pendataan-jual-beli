<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\{JenisModel, ProdukModel};

class ProdukController extends Controller
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
        $produk = DB::table('produk')
        ->join('jenis', 'produk.id_jenis', '=', 'jenis.id_jenis')
        ->get();
        return view('dashboard.produk.list', ['produk' => $produk]);
    }
    public function indexJenis()
    {
        $produk = DB::table('jenis')
        ->get();
        return view('dashboard.jenis.list', ['produk' => $produk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = DB::table('jenis')
        ->get();
        return view('dashboard.produk.tambah', [ 'produk' => $produk ]);
    }

    public function createJenis()
    {
        return view('dashboard.jenis.tambah');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'nama_produk'       => 'required',
            'kode_produk'       => 'required|unique:produk,kode_produk',
            'id_jenis'          => 'required',
            'jumlah_produk'     => 'required|integer',
            'berat_produk'      => 'required|integer',
            'deskripsi_produk'  => 'required',
            'harga_modal'       => 'required|integer',
            'harga_jual'        => 'required|integer'
        ]);
        DB::table('produk')->insert($data);

        return redirect('produk')
        ->With('msg_produk', 'Produk Baru Berhasil Ditambahkan')
        ->With('tipe_produk', 'success');
    }

    public function storeJenis(Request $request)
    {
        $data = $this->validate($request,[
            'nama_jenis'        => 'required|unique:jenis,nama_jenis'
        ]);
        DB::table('jenis')->insert($data);

        return redirect('/produk/jenis')
        ->With('msg_jenis', 'Jenis Baru Berhasil Ditambahkan')
        ->With('tipe_jenis', 'success');
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
    public function edit($id_produk)
    {
        $produk = DB::table('produk')
        ->where('produk.id_produk', $id_produk)
        ->first();

        $jenis = DB::table('jenis')
        ->get();

        if(!$produk){
            abort(404);
        }
        return view('dashboard.produk.edit', ['produk' => $produk], ['jenis' => $jenis]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_produk)
    {
        $data = $this->validate($request,[
            'nama_produk'       => 'required',
            'id_jenis'          => 'required',
            'jumlah_produk'     => 'required|integer',
            'berat_produk'      => 'required|integer',
            'deskripsi_produk'  => 'required',
            'harga_modal'       => 'required|integer',
            'harga_jual'        => 'required|integer'
        ]);
        DB::table('produk')
        ->where('produk.id_produk',$id_produk)
        ->update($data);

        return redirect('produk')
        ->With('msg_produk', 'Data Produk Berhasil Diperbarui')
        ->With('tipe_produk', 'info')
        ->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_produk)
    {
        $delete = DB::table('produk')
        ->join('jenis', 'produk.id_jenis', '=', 'jenis.id_jenis')
        ->where('id_produk',$id_produk)
        ->delete();

        if($delete) {
        return redirect('produk')
        ->With('msg_produk', 'Produk Berhasil Dihapus')
        ->With('tipe_produk', 'success');
        }
    }

    public function destroyJenis($id_jenis)
    {
        $delete = DB::table('jenis')
        ->where('id_jenis',$id_jenis)
        ->delete();

        if($delete) {
        return redirect('/produk/jenis')
        ->With('msg_jenis', 'Jenis Berhasil Dihapus');
        }
    }
}
