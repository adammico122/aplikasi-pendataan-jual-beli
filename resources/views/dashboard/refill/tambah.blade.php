@extends('layout.main')
@section('title', 'Hartono - Tambah Refill Data Product')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title">Input Data Isi Ulang</h2>
          <p class="text-muted">Masukkan Data Refill Dengan Sedetail Mungkin</p>
          {{-- menampilkan error validasi --}}
          @if (count($errors) > 0)
          <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      > {{ $error }}
                  @endforeach
          </div>
          @endif
          <form action="/refill/tambah/data" method="POST">
          <div class="card shadow mb-4">
            <div class="card-header">
              <strong class="card-title">Data Jumlah & Produk</strong>
            </div>
            @csrf
            <div class="card-body">
                <div class="row m-lr-0 mb-3">
                    <div class="col-md-4">
                        <div class="m-b-4"><b>Produk</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                        <div class="fs-12">Pilih produk yang telah di isi ulang.</div>
                    </div>
                    <div class="col-md-8">
                        <select class="custom-select" name="id_produk" id="myProduct" onchange="price(this.options[this.selectedIndex].value)" required>
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
                        <input type="number" class="form-control" name="jumlah_refill" id="jumlah_refill" placeholder="Masukkan Jumlah Refill Produk">
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
                        <input type="number" class="form-control" name="harga_refill" id="result" readonly>
                    </div>
                </div>
                <div class="row m-lr-0 mt-3">
                  <div class="col-md-4">
                      <div class="m-b-4"><b>Harga Beli</b> <span class="badge badge-pill badge-primary"></span></div>
                      <div class="fs-12">Modal/item dari product ini.</div>
                  </div>
                  <div class="col-md-8">
                      <input type="number" class="form-control" id="harga_modal" disabled>
                  </div>
              </div>
                <div class="row m-lr-0 mt-3">
                  <div class="col-md-4">
                      <div class="m-b-4"><b>Jumlah Stok</b> <span class="badge badge-pill badge-primary"></span></div>
                      <div class="fs-12">Jumlah produk setelah melakukan refill.</div>
                  </div>
                  <div class="col-md-8">
                      <input type="number" class="form-control" id="stok" disabled>
                  </div>
              </div>
              <div class="row m-lr-0 mt-3">
                <div class="col-md-4">
                    <div class="m-b-4"><b>Tanggal Refill</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                    <div class="fs-12">Hanya masukkan angka saja. Contoh: 04/04/2021</div>
                </div>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="tanggal_refill">
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
                    harga = Number(data[0]['harga_modal']);
                    stok = Number(data[0]['jumlah_produk']);
                    $('#harga_modal').val(harga)
                    $('#stok').val(stok)
                    $('#result').val(eval(jumlah_refill) * harga);
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
                let hitung = data_product['harga_modal'] * jumlah;
                let jumlahkan = parseInt(data_product['jumlah_produk']) + parseInt(jumlah);
                $('#result').val(hitung)
                $('#stok').val(jumlahkan)
                $('#harga_modal').val(data_product['harga_modal']);

            }

            $('#jumlah_refill').keyup(() => {
                let jumlah = $('#jumlah_refill').val();
                hitungHarga2(jumlah);
            })
            
            </script>
        @endsection