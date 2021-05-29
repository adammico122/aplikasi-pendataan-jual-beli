@extends('layout.main')
@section('title', 'Hartono - Edit Data Product')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title">Edit Data Product</h2>
          <p class="text-muted">Masukkan Data Product Dengan Benar</p>
          {{-- menampilkan error validasi --}}
          @if (count($errors) > 0)
          <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <b> > </b> {{ $error }}
                  @endforeach
          </div>
          @endif
          <form action="/produk/edit/{{$produk->id_produk}}" method="POST">
          <div class="card shadow mb-4">
            <div class="card-header">
              <strong class="card-title">Nama & Kategori Produk ( <b>{{ $produk->kode_produk }}</b> )</strong>
            </div>
            @csrf
            <div class="card-body">
                <div class="row m-lr-0 mb-2">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Nama Produk</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Nama min. 5 kata, terdiri dari jenis produk, merek, dan keterangan seperti warna, bahan, atau tipe.</div>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nama_produk" value="{{ $produk->nama_produk }}" placeholder="Masukkan Nama Produk">
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Kategori</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Pilih kategori yang sesuai dengan produk.</div>
                    </div>
                    <div class="col-md-8">
                        <select class="custom-select" name="id_jenis">
                            @foreach ($jenis as $item)
                            <option value="{{ $item->id_jenis }}">{{ $item->nama_jenis }}</option>
                            @endforeach
                        	</select>
                    </div>
                </div>
            </div>
              </div>
            </div>
          </div> <!-- / .card -->
          <div class="card shadow mb-4">
            <div class="card-header">
              <strong class="card-title">Detail Harga & Stok Produk</strong>
            </div>
            <div class="card-body">
                <div class="row m-lr-0 mb-2">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Stock Produk</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Hanya masukkan angka saja. Contoh: 1000</div>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="jumlah_produk" value="{{ $produk->jumlah_produk }}" placeholder="Masukkan Stock Produk">
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Harga Beli/Modal</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Harga modal/harga beli product ini.</div>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="harga_modal" value="{{ $produk->harga_modal }}" placeholder="Masukkan Harga Beli/Modal">
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Harga Jual</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Harga jual barang ini. Hanya masukkan angka saja. Contoh: 350000</div>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="harga_jual" value="{{ $produk->harga_jual }}" placeholder="Masukkan Harga Jual">
                    </div>
                </div>
              </div>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header">
              <strong class="card-title">Deskripsi Produk</strong>
            </div>
            <div class="card-body">
                <div class="row m-lr-0 mb-2">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Berat Produk (gram)</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Hanya isi dengan angka, misal berat 1kg maka isi: 1000</div>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="berat_produk" value="{{ $produk->berat_produk }}" placeholder="Masukkan Berat Produk ( Gram )">
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Deskripsi Produk</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Masukkan Deskripsi lengkap produk untuk memudahkan pembeli memahami produk yang dijual.</div>
                    </div>
                    <div class="col-md-8 mb-3">
                        <textarea class="form-control" id="editor" name="deskripsi_produk" value="{{ $produk->deskripsi_produk }}" style="min-height:250px;"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2 mt-1">Simpan Data</button>
                <button type="reset" class="btn btn-secondary mr-1 mt-1">Reset</button>
                </div>
              </div>
            </div>
          </div> <!-- / .card -->
        </form>
          @endsection