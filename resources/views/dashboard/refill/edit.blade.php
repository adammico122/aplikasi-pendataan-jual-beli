@extends('layout.main')
@section('title', 'Hartono - Edit Data Refill')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title">Edit Data Refill</h2>
          <p class="text-muted">Masukkan Data Refill Dengan Benar</p>
          {{-- menampilkan error validasi --}}
          @if (count($errors) > 0)
          <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <b> > </b> {{ $error }}
                  @endforeach
          </div>
          @endif
          <form action="/refill/edit/{{$refill->id_refill}}" method="POST">
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
                            <option value="{{ $item->id_produk }}">{{ $item->nama_produk }} - [ @currency($item->harga_modal)/1 Item ]</option>
                            @endforeach
                        	</select>
                    </div>
                </div>
                <div class="row m-lr-0 mb-2">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Jumlah Refill Produk</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Masukkan jumlah refill produk, hanya angka saja. Contoh:1000</div>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="jumlah_refill" id="jumlah_refill" value="{{ $refill->jumlah_refill }}" placeholder="Masukkan Jumlah Refill Produk">
                    </div>
                </div>
            </div>
              </div>
            </div>
          </div> <!-- / .card -->
          <div class="card shadow mb-4">
            <div class="card-header">
              <strong class="card-title">Detail Tanggal & Harga Refill</strong>
            </div>
            <div class="card-body">
                <div class="row m-lr-0 mb-2">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Modal Refill</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Harga modal/harga beli product ini secara keseluruhan.</div>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="harga_refill" value="{{ $refill->harga_refill }}" readonly>
                    </div>
                </div>
              <div class="row m-lr-0 mt-3">
                <div class="col-md-4">
                    <div class="m-b-4"><b>Tanggal Refill</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                    <div class="fs-12">Hanya masukkan angka saja. Contoh: 04/04/2021</div>
                </div>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="tanggal_refill" value="{{ $refill->tanggal_refill }}">
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