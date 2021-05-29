@extends('layout.main')
@section('title','Hartono - List Produk')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h5 class="h5 page-title"><span class="badge badge-primary">List Produk</span></h5>
          <p class="text-muted">Berikut Adalah Daftar Produk Anda</p>
        </div>
        <!-- Striped rows -->
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
          @if (session('msg_produk'))
                    <div class="alert alert-{{ session('tipe_produk') }} alert-dismissible fade show" role="alert">
                      <b><h4><i class="icon fa fa-check"></i> Success</b></h4>
                      {{ session('msg_produk') }}.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </div>
                    @endif
            <div class="card shadow">
              <div class="card-header">
                <strong class="card-title">Product</strong>
                <a class="float-right small text-muted" href="#!">View all</a>
              </div>
              <div class="card-body my-n2">
                <table class="table table-striped table-hover table-borderless">
                  <thead>
                    <tr>
                      <th>Kode Produk</th>
                      <th>Nama Produk</th>
                      <th>Jenis Produk</th>
                      <th>Jumlah Produk</th>
                      <th>Berat Produk ( Gram )</th>
                      <th>Modal/Item</th>
                      <th>Modal Keseluruhan</th>
                      <th>Harga Jual/Item</th>
                      <th>Keuntungan/Item</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($produk as $item)
                    <tr>
                      <td><b class="text-primary">{{ $item->kode_produk }}</b></td>
                      <th class="text-primary"><b>{{ $item->nama_produk }}</b></th>
                      <td>{{ $item->nama_jenis }}</td>
                      <td>{{ $item->jumlah_produk }}</td>
                      <td>@gram($item->berat_produk)</td>
                      <td>@currency($item->harga_modal)</td>
                      <td>@currency($item->harga_modal * $item->jumlah_produk)</td>
                      <td>@currency($item->harga_jual)</td>
                      <td>@currency($item->harga_jual - $item->harga_modal)</td>
                      <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $item->id_produk }}">Delete</button>
                        <a href="/produk/edit/{{ $item->id_produk }}" class="btn btn-primary">Edit</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <a href="/produk/tambah" class="btn btn-primary mt-3">Tambah Produk Baru</a>
          </div> <!-- Striped rows -->
          @foreach($produk as $item)
          <!-- Modal -->
            <div class="modal fade" id="delete{{ $item->id_produk }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><i class="fe fe-x-octagon"></i> Hapus <b class="text-danger">{{ $item->nama_produk }}</b></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                  Apakah Anda Yakin Ingin Menghapus Produk Ini?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="/produk/delete/{{ $item->id_produk }}" class="btn btn-primary">Hapus</a>
                            </div>
                      </div>
                  </div>
              </div>
                                @endforeach
@endsection