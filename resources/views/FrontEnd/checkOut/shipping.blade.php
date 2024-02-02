@extends('FrontEnd.master')

@section('title')
    Pengiriman
@endsection

@section('content')

    <!-- Shipping -page -->
    <div class="login-page about">
        <img class="login-w3img" src="{{ asset('/') }}frontEndSourceFile/images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Masukkan Informasi Pengiriman Anda</h3>
            <p class="w3ls-title w3ls-title1 text-center" >Anda dapat mengubah informasi pengiriman Anda</p>
            <div class="login-agileinfo">
                <form action="{{ route('store_shipping') }}" method="post">
                    @csrf
                    <label>Nama Lengkap</label>
                    <input class="agile-ltext" type="text" name="name" placeholder="Nama Lengkap" value="{{ $customer->name }}">
                    <label>Email</label>
                    <input class="agile-ltext" type="email" name="email" placeholder="Email" value="{{ $customer->email }}">
                    <label>Nomor Telepon</label>
                    <input class="agile-ltext" type="text" name="phone_no" placeholder="Nomor Telepon" value="{{ $customer->phone_no }}">
                    <label>Alamat</label>
                    <input class="agile-ltext" type="text" name="address" placeholder="Alamat" value="">
                    <div class="wthreelogin-text">
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" value="Klik Untuk Konfirmasi Pesanan">
                </form>
            </div>
        </div>
    </div>
    <!-- //Shipping -page -->

@endsection
