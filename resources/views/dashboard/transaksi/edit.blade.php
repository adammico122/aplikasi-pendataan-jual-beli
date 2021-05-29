@extends('layout.main')
@section('title', 'Hartono - Edit Data Transaksi')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title">Edit Data Transaksi</h2>
          <p class="text-muted">Masukkan Data Transaksi Dengan Benar</p>
          {{-- menampilkan error validasi --}}
          @if (count($errors) > 0)
          <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <b> > </b> {{ $error }}
                  @endforeach
          </div>
          @endif
          <form action="/transaksi/edit/{{$transaksi->id_transaksi}}" method="POST">
          <div class="card shadow mb-4">
            <div class="card-header">
              <strong class="card-title">Detail Data ( <b>{{ $transaksi->kode_transaksi }}</b> )</strong>
            </div>
            @csrf
            <div class="card-body">
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Produk</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Pilih produk yang sesuai dengan transaksi.</div>
                    </div>
                    <div class="col-md-8">
                        <select class="custom-select" name="id_produk" id="myProduct" required>
                            <option value="" holder>- Pilih Produk -</option>
                            @foreach($produk as $item)
                            <option value="{{ $item->id_produk }}">{{ $item->nama_produk }} - [ @currency($item->harga_jual)/1 Item ]</option>
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
              <strong class="card-title">Detail Harga & Jumlah Transaksi</strong>
            </div>
            <div class="card-body">
                <div class="row m-lr-0 mb-2">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Jumlah Produk</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Hanya masukkan angka saja. Contoh: 1000</div>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="jumlah_transaksi" id="jumlah_transaksi" value="{{ $transaksi->jumlah_transaksi }}" placeholder="Masukkan Stock Produk">
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Total Harga</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Total harga beli product ini.</div>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="result" name="harga_transaksi" value="{{ $transaksi->harga_transaksi }}" readonly>
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Tanggal Transaksi</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Tanggal transaksi/pembelian ini dilakukan. Contoh: 1999/09/09</div>
                    </div>
                    <div class="col-md-8">
                        <input type="date" class="form-control" name="tanggal_transaksi" value="{{ $transaksi->tanggal_transaksi }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2 mt-2">Update Data</button>
                <button type="reset" class="btn btn-secondary mr-1 mt-2">Reset</button>
                </div>
              </div>
            </div>
          </div> <!-- / .card -->
        </form>
          @endsection