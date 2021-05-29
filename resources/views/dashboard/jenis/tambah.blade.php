@extends('layout.main')
@section('title', 'E-Dash - Tambah Data Jenis')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title">Input Data Jenis Baru</h2>
          {{-- menampilkan error validasi --}}
          @if (count($errors) > 0)
          <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      - <b>{{ $error }}</b>
                  @endforeach
          </div>
          @endif
          <form action="/produk/tambah/jenis" method="POST">
          <div class="card shadow mb-4">
            <div class="card-header">
              <strong class="card-title">Detail Jenis</strong>
            </div>
            @csrf
            <div class="card-body">
                <div class="row m-lr-0 mb-2">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Nama Jenis</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Masukkan nama jenis untuk produk dan pastikan tidak sama dengan produk yang lain.</div>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nama_jenis" placeholder="Masukkan Nama Jenis">
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