@extends('layout.main')
@section('title', 'Hartono - Transaksi Baru')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title">Input Data Transaksi Baru</h2>
          {{-- menampilkan error validasi --}}
          @if (count($errors) > 0)
          <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      - <b>{{ $error }}</b>
                  @endforeach
          </div>
          @endif
          <form action="/transaksi/tambah/data" method="POST">
          <div class="card shadow mb-4">
            <div class="card-header">
              <strong class="card-title">Detail Transaksi & Produk</strong>
            </div>
            @csrf
            <div class="card-body">
                <div class="row m-lr-0 mb-2">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Kode Transaksi</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Masukkan kode unik untuk produk dan pastikan tidak sama dengan produk yang lain.</div>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="kode_transaksi" value="{{ $kode }}" placeholder="Masukkan Kode Transaksi" readonly>
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Produk</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Pilih produk yang sesuai dengan transaksi.</div>
                    </div>
                    <div class="col-md-8">
                        <select class="custom-select" name="id_produk" id="myProduct" onchange="price(this.options[this.selectedIndex].value)" required>
                            <option value="" holder>- Pilih Produk -</option>
                            @foreach($transaksi as $item)
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
                        <input type="number" class="form-control" name="jumlah_transaksi" id="jumlah_transaksi" placeholder="Masukkan Stock Produk">
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Harga Jual</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Akan terisi otomatis setelah product dipilih.</div>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="harga_jual" name="harga_jual" readonly>
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Total Harga</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Total harga beli product ini.</div>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="result" name="harga_transaksi" readonly>
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Sisa Stok</b> <span class="badge badge-pill badge-primary"></span></div>
                        <div class="fs-12">Jumlah produk yang tersisa setelah melakukan transaksi.</div>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="stok" name="stok" disabled>
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Tanggal Transaksi</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Tanggal transaksi/pembelian ini dilakukan. Contoh: 1999/09/09</div>
                    </div>
                    <div class="col-md-8">
                        <input type="date" class="form-control" name="tanggal_transaksi" value="{{ old('tanggal_transaksi')}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2 mt-2">Tambah Data</button>
                <button type="reset" class="btn btn-secondary mr-1 mt-2">Reset</button>
                </div>
              </div>
            </div>
          </div> <!-- / .card -->
        </form>


    @endsection

    @section('scripts')
                  
        <script text="javascript">
            var harga = 0;
            var stok = 0;
            var data_product;
            function price(id) {
                console.log(id)
                $.ajax({
                type: 'POST',
                url: "{{ url('/transaksi/getData') }}",
                data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                },
                success: function(data) {
                    data_product = data[0];
                    harga = Number(data[0]['harga_jual']);
                    stok = Number(data[0]['jumlah_produk']);
                    $('#harga_jual').val(harga)
                    $('#stok').val(stok)
                    $('#result').val(eval(jumlah_transaksi) * harga);
                    console.log(result);
                },
                error: function(response) {
                console.log(response.responseText);
                }
            });
            };

            /* function hitungHarga(jumlah) {
                let idProduct = $('#myProduct').val();
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/transaksi/hitungHarga') }}",
                    data: {
                            "_token": "{{ csrf_token() }}",
                            "jumlah": jumlah,
                            "id_product" : idProduct
                    },
                    success: function(data) {
                        console.log(data);

                        if(data.status) {
                            console.log("Harga = "+data.hitung);
                            let hitung = jumlah * data.produk.harga_jual;
                            // $('#result').val(data.hitung)
                            $('#result').val(hitung)
                        } else {
                            console.log(data.msg);
                        }
                    },
                    error: function(response) {
                        console.log(response.responseText);
                    }
                });
            }
            */

            function hitungHarga2(jumlah) {
                // var harga = $('#harga_jual').val();
                let hitung = data_product['harga_jual'] * jumlah;
                let stok = data_product['jumlah_produk'] - jumlah;
                $('#result').val(hitung)
                if(stok < 0){
                    alert("Maaf Anda Tidak Dapat Melakukan Transaksi Melebihi Stock Product");
                    setTimeout(function(){
                    window.location.reload(1);
                    }, 90);
                } else {
                $('#stok').val(stok);
                }
            }

            $('#jumlah_transaksi').keyup(() => {
                let jumlah = $('#jumlah_transaksi').val();
                hitungHarga2(jumlah);
            })
            
            </script>
        @endsection