@extends('BackEnd.master')
@section('title')
    Home page || (Dashboard)
@endsection
@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 mb-0 text-gray-800 "><strong>Selamat Datang di Panel Admin</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-3 col-md-3 mb-4 ">
                <div class="card border-left-primary shadow h-100 py-2 bg-info">
                    <div class="card-body  ">
                        @php
                            $OrderCount = App\Order::all()->count();
                        @endphp
                        <div class="row no-gutters align-items-center ">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pesanan Baru !!!</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h4>Total Pesanan {{ $OrderCount }} </h4>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <a href="{{ route('show_order') }}" class="small-box-footer" style="color: #0e882a">Tampilkan Pesanan <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-3 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-warning">
                    <div class="card-body">
                        @php
                            $CustomerCount = App\Customer::all()->count();
                        @endphp
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total {{ $CustomerCount }}!</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h4>Pelanggan Terdaftar</h4>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              


            <div class="col-xl-3 col-md-3 mb-4 ">
                <div class="card border-left-primary shadow h-100 py-2 bg-danger">
                    <div class="card-body  ">
                        @php
                            $OrderCount = App\Order::all()->count();
                        @endphp
                        <div class="row no-gutters align-items-center ">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pemesanan Acara !!!</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h4>Pesanan Acara {{ $OrderCount }} </h4>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <a href="{{ route('show_order') }}" class="small-box-footer" style="color: #0e882a">Tampilkan Pesanan <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>


    </div>

    @endsection

