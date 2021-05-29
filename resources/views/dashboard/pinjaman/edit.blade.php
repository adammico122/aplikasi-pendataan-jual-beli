@extends('layout.main')
@section('title', 'Hartono - Edit Data Pinjaman')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title">Edit Data Pinjaman</h2>
          <p class="text-muted">Masukkan Data Pinjaman Dengan Benar</p>
          {{-- menampilkan error validasi --}}
          @if (count($errors) > 0)
          <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <b> > </b> {{ $error }}
                  @endforeach
          </div>
          @endif
          <form action="/pinjaman/edit/{{$pinjaman->id_pinjaman}}" method="POST">
          <div class="card shadow mb-4">
            <div class="card-header">
              <strong class="card-title">Detail Data</strong>
            </div>
            @csrf
            <div class="card-body">
                <div class="row m-lr-0 mb-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Produk</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Pilih produk yang telah di isi ulang.</div>
                    </div>
                    <div class="col-md-8">
                        <select class="custom-select" name="id_produk" id="myProduct" required>
                          <option value="" holder>- Pilih Product -</option>
                            @foreach($produk as $item)
                            <option value="{{ $item->id_produk }}">{{ $item->nama_produk }} - [ @currency($item->harga_jual)/1 Item ]</option>
                            @endforeach
                        	</select>
                    </div>
                </div>
                <div class="row m-lr-0 mb-2">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Nama Peminjam</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Masukkan nama peminjam, contoh: Adam</div>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nama_peminjam" id="nama_peminjam" value="{{ $pinjaman->nama_peminjam }}" placeholder="Masukkan Nama Peminjam Barang">
                    </div>
                </div>
            </div>
              </div>
            </div>
          </div> <!-- / .card -->
          <div class="card shadow mb-4">
            <div class="card-header">
              <strong class="card-title">Detail Tanggal & Jumlah Pinjaman</strong>
            </div>
            <div class="card-body">
                <div class="row m-lr-0 mb-2">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Jumlah Barang</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Harga jumlah barang yang dipinjam.</div>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="jumlah_barang" value="{{ $pinjaman->jumlah_barang }}" placeholder="Masukkan Jumlah Barang">
                    </div>
                </div>
              <div class="row m-lr-0 mt-3">
                <div class="col-md-4">
                    <div class="m-b-4"><b>Tanggal Pinjam</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                    <div class="fs-12">Hanya masukkan angka saja. Contoh: 04/04/2021</div>
                </div>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="tanggal_pinjam" value="{{ $pinjaman->tanggal_pinjam }}">
                </div>
            </div>
                <button type="submit" class="btn btn-primary mr-2 mt-1">Update Data</button>
                <button type="reset" class="btn btn-secondary mr-1 mt-1">Reset</button>
                </div>
              </div>
            </div>
          </div> <!-- / .card -->
        </form>
          @endsection