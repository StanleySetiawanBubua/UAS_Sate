@extends('BackEnd.master')
@section('title')

    Tambah Kupon
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">

                @if(Session::get('sms'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('sms') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header text-center">
                        Kode Kupon
                    </div>
                    <div class="card-body">

                        <form action="{{ route('save_coupon_code') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nama Kode</label>
                                <input type="text" class="form-control"  name="coupon_code" required="">
                            </div>

                            <div class="form-group">
                                <label >Nilai Kupon</label>
                                <input type="text" class="form-control" name="coupon_value" required="">
                            </div>
                            <div class="form-group">
                                <label >Nilai Minimum Pembelian</label>
                                <input type="text" class="form-control" name="cart_min_value" required="">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Kadaluwarsa</label>
                                <input type="date" class="form-control" name="expired_on" required="">
                            </div>
                            <div class="form-group">
                                <label >Ditambah Pada</label>
                                <input type="date" class="form-control" name="added_on" required="">
                            </div>
                            <div class="form-group">
                                <label>Pilih Tipe Kupon</label>
                                <div class="radio">
                                    <input type="radio" name="coupon_type" value="1">Persentase
                                    <input type="radio" name="coupon_type" value="0">Tetap
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <div class="radio">
                                    <input type="radio" name="coupon_status" value="1">Aktif
                                    <input type="radio" name="coupon_status" value="0">Tidak Aktif
                                </div>
                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Simpan Kode Kupon</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
