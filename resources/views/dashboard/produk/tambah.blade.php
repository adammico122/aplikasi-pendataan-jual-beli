@extends('layout.main')
@section('title', 'E-Dash - Tambah Data Product')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title">Input Data Product</h2>
          <p class="text-muted">Masukkan Data Product Dengan Sedetail Mungkin</p>
          <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card mb-3 shadow">
              <div class="card-body my-n3">
                <div class="row align-items-center">
                  <div class="col-1 text-center">
                    <span class="circle circle-md bg-primary">
                      <i class="fe fe-info fe-24 text-light"></i>
                    </span>
                  </div> <!-- .col -->
                  <div class="col">
                      <h3 class="h5 mt-3 mb-1">Notifikasi</h3>
                      <hr class="mt-1 mb-1">
                    <p class="text-primary">Sebelum mulai menginputkan data pastikan data sudah terisi dengan benar.</p>
                  </div> <!-- .col -->
                </div> <!-- .row -->
              </div> <!-- .card-body -->
            </div> <!-- .card -->
          </div> <!-- .col-md-->
        </div> <!-- .row-->
          {{-- menampilkan error validasi --}}
          @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
          <form action="/produk/tambah/data" method="POST">
          <div class="card shadow mb-4">
            <div class="card-header">
              <strong class="card-title">Nama & Kategori Produk</strong>
            </div>
            @csrf
            <div class="card-body">
                <div class="row m-lr-0 mb-2">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Nama Produk</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Nama min. 5 kata, terdiri dari jenis produk, merek, dan keterangan seperti warna, bahan, atau tipe.</div>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nama_produk" value="{{ old('nama_produk')}}" placeholder="Masukkan Nama Produk">
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Kode Produk</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Masukkan kode unik untuk produk dan pastikan tidak sama dengan produk yang lain.</div>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="kode_produk" value="{{ old('kode_produk')}}" placeholder="Masukkan Kode Produk">
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Kategori</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Pilih kategori yang sesuai dengan produk.</div>
                    </div>
                    <div class="col-md-8">
                        <select class="custom-select" name="id_jenis" required>
                            @foreach($produk as $item)
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
                        <input type="number" class="form-control" name="jumlah_produk" value="{{ old('jumlah_produk')}}" placeholder="Masukkan Stock Produk">
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Harga Beli/Modal</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Harga modal/harga beli product ini.</div>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="harga_modal" value="{{ old('harga_modal')}}" placeholder="Masukkan Harga Beli/Modal">
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Harga Jual</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Harga jual barang ini. Hanya masukkan angka saja. Contoh: 350000</div>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="harga_jual" value="{{ old('harga_jual')}}" placeholder="Masukkan Harga Jual">
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
                        <input type="number" class="form-control" name="berat_produk" value="{{ old('berat_produk')}}" placeholder="Masukkan Berat Produk ( Gram )">
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Deskripsi Produk</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Masukkan Deskripsi lengkap produk untuk memudahkan pembeli memahami produk yang dijual.</div>
                    </div>
                    <div class="col-md-8 mb-3">
                        <textarea class="form-control" id="editor" name="deskripsi_produk" style="min-height:250px;"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2 mt-1">Tambah Data</button>
                <button type="reset" class="btn btn-secondary mr-1 mt-1">Reset</button>
                </div>
              </div>
            </div>
          </div> <!-- / .card -->
        </form>
          @endsection