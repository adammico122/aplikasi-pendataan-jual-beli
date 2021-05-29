@extends('layout.main')
@section('title','Hartono - List Transaksi')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h5 class="h5 page-title"><span class="badge badge-primary">List Transaksi</span></h5>
          <p class="text-muted">Berikut Adalah Daftar Transaksi</p>
        </div>
        <!-- Striped rows -->
        <div class="col-md-12 col-lg-12 col-sm-12">
          @if(session('kode'))
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <b>Success</b>, Data Transaksi Baru Berhasil Ditambahkan ( {{session('kode')}} )
          </div>
          @endif
          @if(session('msg_transaksi'))
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <b>Success</b>, {{session('msg_transaksi')}}
          </div>
          @endif
            <div class="card shadow">
              <div class="card-header">
                <strong class="card-title">Transaksi</strong>
                <a class="float-right small text-muted" href="#!">View all</a>
              </div>
              <div class="card-body my-n2">
                <table class="table table-striped table-hover table-borderless">
                  <thead>
                    <tr>
                      <th>Kode Transaksi</th>
                      <th>Produk</th>
                      <th>Jumlah Transaksi</th>
                      <th>Harga Transaksi</th>
                      <th>Tanggal Transaksi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($produk as $item)
                    <tr>
                      <td><b class="text-primary">{{ $item->kode_transaksi }}</b></td>
                      <th scope="col" class="text-primary"><b>{{ $item->nama_produk }}</b></th>
                      <td>{{ $item->jumlah_transaksi }}</td>
                      <td>@currency($item->harga_transaksi)</td>
                      <td>{{ $item->tanggal_transaksi }}</td>
                      <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $item->id_transaksi }}">Delete</button>
                        <a href="/transaksi/edit/{{ $item->id_transaksi }}" class="btn btn-primary">Edit</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="3">Grand Total</th>
                      <th>@currency($sum),00</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <a href="/transaksi/tambah" class="btn btn-primary mt-3">Tambah Transaksi Baru</a>
          </div> <!-- Striped rows -->
          @foreach($produk as $item)
          <!-- Modal -->
            <div class="modal fade" id="delete{{ $item->id_transaksi }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><i class="fe fe-x-octagon"></i> Hapus <b class="text-danger">{{ $item->kode_transaksi }}</b></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                  Apakah Anda Yakin Ingin Menghapus Transaksi Ini?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="/transaksi/delete/{{ $item->id_transaksi }}" class="btn btn-primary">Hapus</a>
                            </div>
                      </div>
                  </div>
              </div>
                                @endforeach
@endsection