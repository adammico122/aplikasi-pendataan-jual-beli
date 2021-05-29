@extends('layout.main')
@section('title','Hartono - Refill Barang')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h5 class="h5 page-title"><span class="badge badge-primary">Data Refill/Isi Ulang Barang</span></h5>
          <p class="text-muted">Berikut Adalah Data Refill Produk Anda</p>
        </div>
        <!-- Striped rows -->
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
          @if (session('harga'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <b>Success</b> Data Refill/Isi Ulang Sebesar @currency(session('harga')) Berhasil Ditambahkan.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </div>
                    @endif
          @if (session('msg_Refill'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <b>Success</b>, {{ session('msg_Refill') }}.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </div>
                    @endif
            <div class="card shadow">
              <div class="card-header">
                <strong class="card-title">Data Refill/Isi Ulang Barang</strong>
                <a class="float-right small text-muted" href="#!">View all</a>
              </div>
              <div class="card-body my-n2">
                <table class="table table-striped table-hover table-borderless">
                  <thead>
                    <tr>
                      <th>ID Refill</th>
                      <th>Nama Produk</th>
                      <th>Jumlah Refill</th>
                      <th>Tanggal Refill</th>
                      <th>User</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($refill as $item)
                    <tr>
                      <td><b class="text-primary">{{ $item->id_refill }}</b></td>
                      <th class="text-primary"><b>{{ $item->nama_produk }}</b></th>
                      <td>{{ $item->jumlah_refill }}</td>
                      <td>{{ $item->tanggal_refill }}</td>
                      <td>@currency($item->harga_refill)</td>
                      <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $item->id_refill }}">Delete</button>
                        <a href="/refill/edit/{{ $item->id_refill }}" class="btn btn-primary">Edit</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <a href="/refill/tambah" class="btn btn-primary mt-3">Tambah Data Refill Baru</a>
          </div> <!-- Striped rows -->
          @foreach($refill as $item)
          <!-- Modal -->
            <div class="modal fade" id="delete{{ $item->id_refill }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><i class="fe fe-x-octagon"></i> Hapus <b class="text-danger">{{ $item->nama_produk }} - @currency($item->harga_refill)</b></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                  Apakah Anda Yakin Ingin Menghapus Produk Ini?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="/refill/delete/{{ $item->id_refill }}" class="btn btn-primary">Hapus</a>
                            </div>
                      </div>
                  </div>
              </div>
                                @endforeach
@endsection