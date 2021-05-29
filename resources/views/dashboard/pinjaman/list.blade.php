@extends('layout.main')
@section('title','Hartono - Pinjaman Barang')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h5 class="h5 page-title"><span class="badge badge-primary">Data Peminjam Barang</span></h5>
          <p class="text-muted">Berikut Adalah Data Peminjam Produk Anda</p>
        </div>
        <!-- Striped rows -->
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
          @if (session('nama'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <b>Success</b> Data Peminjam <b><i>{{session('nama')}}</i></b> Berhasil Ditambahkan.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </div>
                    @endif
          @if (session('msg_Peminjam'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <b>Success</b>, {{session('msg_Peminjam')}}.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </div>
                    @endif
            <div class="card shadow">
              <div class="card-header">
                <strong class="card-title">Data Peminjam Barang</strong>
                <a class="float-right small text-muted" href="#!">View all</a>
              </div>
              <div class="card-body my-n2">
                <table class="table table-striped table-hover table-borderless">
                  <thead>
                    <tr>
                      <th>ID Pinjaman</th>
                      <th>Nama Peminjam</th>
                      <th>Nama Product</th>
                      <th>Jumlah Barang</th>
                      <th>Tanggal Pinjam</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                    <tr>
                      <td>{{ $item->id_pinjaman }}</td>
                      <th class="text-primary"><b>{{ $item->nama_peminjam }}</b></th>
                      <td>{{ $item->nama_produk }}</td>
                      <td>{{ $item->jumlah_barang }}</td>
                      <td>{{ $item->tanggal_pinjam }}</td>
                      <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $item->id_pinjaman }}">Delete</button>
                        <a href="/pinjaman/edit/{{ $item->id_pinjaman }}" class="btn btn-primary">Edit</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <a href="/pinjaman/tambah" class="btn btn-primary mt-3">Tambah Data Peminjam Baru</a>
          </div> <!-- Striped rows -->
          @foreach($data as $item)
          <!-- Modal -->
            <div class="modal fade" id="delete{{ $item->id_pinjaman }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><i class="fe fe-x-octagon"></i> Hapus <b class="text-danger">{{ $item->nama_peminjam }} - {{ $item->nama_produk }}</b></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                  Apakah Anda Yakin Ingin Menghapus Data Pinjaman Ini?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="/pinjaman/delete/{{ $item->id_pinjaman }}" class="btn btn-primary">Hapus</a>
                            </div>
                      </div>
                  </div>
              </div>
                                @endforeach
@endsection