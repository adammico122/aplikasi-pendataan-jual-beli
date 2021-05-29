@extends('layout.main')
@section('title','Hartono - Dashboard')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
              <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow bg-primary text-white">
                    <div class="card-header bg-primary">
                      <span class="card-title text-white">Hari Ini</span>
                    </div>
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary-light">
                            <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-light mb-0">Total Transaksi</p>
                          <span class="h3 mb-0 text-white">{{ $transaksi }} PCS</span>
                          <span class="small text-white">+@currency($transaksi_untung)</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow bg-warning text-white">
                    <div class="card-header bg-warning">
                      <span class="card-title text-white">Kemarin</span>
                    </div>
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-warning-light">
                            <i class="fe fe-16 fe-rotate-ccw text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-light mb-0">Total Transaksi</p>
                          <span class="h3 mb-0 text-white">{{ $transaksi_kemarin }} PCS</span>
                          <span class="small text-white">+@currency($transaksi_kemarin_untung)</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow bg-success text-white">
                    <div class="card-header bg-success">
                      <span class="card-title text-white">Bulan Ini</span>
                    </div>
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-success-light">
                            <i class="fe fe-16 fe-calendar text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-light mb-0">Total Transaksi</p>
                          <span class="h3 mb-0 text-white">{{$transaksi_bulan_ini}} PCS</span>
                          <span class="small text-white">+@currency($untung_bulan_ini)</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow bg-danger text-white">
                    <div class="card-header bg-danger">
                      <span class="card-title text-white">Bulan Lalu</span>
                    </div>
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-danger-light">
                            <i class="fe fe-16 fe-calendar text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-light mb-0">Total Transaksi</p>
                          <span class="h3 mb-0 text-white">{{$transaksi_bulan_lalu}} PCS</span>
                          <span class="small text-white">+@currency($untung_bulan_lalu)</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> <!-- End Section -->
              </div>
          <div class="row items-align-baseline">
            <div class="col-md-12 col-lg-12">
              <div class="card shadow eq-card mb-4">
                <div class="card-body mb-n3">
                  <div class="row items-align-baseline h-100">
                    <div class="col-md-6 my-3">
                      <p class="mb-0"><strong class="mb-0 text-uppercase text-muted">Penghasilan</strong></p>
                      <h3>@currency($keseluruhan_hasil)</h3>
                      <p class="text-muted">Jumlah Keseluruhan Penghasilan Anda</p>
                </div> <!-- .card-body -->
              </div> <!-- .card -->
            </div> <!-- .col -->
          </div> <!-- .row-->
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
@endsection