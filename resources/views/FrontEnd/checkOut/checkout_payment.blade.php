@extends('FrontEnd.master')

@section('title')
    Checkout
@endsection

@section('content')

    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">
                {{--@if(Session::get('sms'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('sms') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif--}}

                <div class="card">
                    <div class="card-header text-muted">
                        <h3 class="text-center">Masukkan Metode Pembayaran Anda</h3>
                            <strong class="text-center">{{ Session::get('sms') }}</strong>
                    </div>
                    <div class="card mt-4">
                        <h5 class=" card-header text-center text-muted" style="margin-top: 10px">Silahkan Pilih</h5>
                        <div class="card-body">
                            <div class="checkout-left">
                                <div class="address_form_agile mt-sm-5 mt-4">

                                    <form action="{{ route('new_order') }}" method="post">
                                        @csrf
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Bayar di Tempat</th>
                                                <td><input type="radio" name="payment_type" value="Cash On"> Bayar di Tempat</td>
                                            </tr>
                                            <tr>
                                                <th>Kartu ATM</th>
                                                <td><input type="radio" class="mr-5" name="payment_type" value="Stripe"> ATM<</td>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <td><input type="submit" name="btn" class="btn btn-success" value="Konfirmasi Pesanan"></td>
                                            </tr>
                                        </table>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
