@extends('BackEnd.master')
@section('title')

    Tambah Kurir Antar
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
                        Kurir Antar
                    </div>
                    <div class="card-body">

                        <form action="{{ route('save_delivery_boy') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control"  name="delivery_boy_name" required="">
                            </div>
                            <div class="form-group">
                                <label >Nomor Telepon</label>
                                <input type="text" class="form-control" name="delivery_boy_phone_number" required="">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control"  name="delivery_boy_address" required="">
                            </div>
                            <div class="form-group">
                                <label >Ditambah Pada</label>
                                <input type="date" class="form-control" name="added_on">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <div class="radio">
                                    <input type="radio" name="delivery_boy_status" value="1">Aktif
                                    <input type="radio" name="delivery_boy_status" value="0">Tidak Aktif
                                </div>
                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Tambah Kurir Antar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
