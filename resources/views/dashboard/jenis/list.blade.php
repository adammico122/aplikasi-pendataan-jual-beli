@extends('layout.main')
@section('title','Hartono - List Jenis Produk')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h5 class="h5 page-title"><span class="badge badge-primary">List Jenis</span></h5>
          <p class="text-muted">Berikut Adalah Daftar Jenis</p>
        </div>
        <!-- Striped rows -->
        <div class="col-md-12 col-lg-12 col-sm-12">
          @if (session('msg_jenis'))
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <b>Success</b>, {{session('msg_jenis')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </div>
          @endif
            <div class="card shadow">
              <div class="card-header">
                <strong class="card-title">Data Jenis</strong>
                <a class="float-right small text-muted" href="#!">View all</a>
              </div>
              <div class="card-body my-n2">
                <table class="table table-striped table-hover table-borderless">
                  <thead>
                    <tr>
                      <th>ID Jenis</th>
                      <th>Nama Jenis</th>
                      <th>Dibuat Tanggal</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($produk as $item)
                    <tr>
                      <td><b class="text-primary">{{ $item->id_jenis }}</b></td>
                      <th scope="col" class="text-primary"><b>{{ $item->nama_jenis }}</b></th>
                      <td>{{ $item->created_at }}</td>
                      <td>
                        <a href="/jenis/delete/{{ $item->id_jenis }}" class="btn btn-danger">Hapus</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <a href="/jenis/tambah" class="btn btn-primary mt-3">Tambah Jenis Baru</a>
          </div> <!-- Striped rows -->
          @foreach($produk as $item)
          <!-- Modal -->
            <div class="modal fade" id="delete{{ $item->id_jenis }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><i class="fe fe-x-octagon"></i> Hapus <b class="text-danger">{{ $item->nama_jenis }}</b></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                  Apakah Anda Yakin Ingin Menghapus Jenis Ini?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="/jenis/delete/{{ $item->id_jenis }}" class="btn btn-primary">Hapus</a>
                            </div>
                      </div>
                  </div>
              </div>
                                @endforeach
@endsection