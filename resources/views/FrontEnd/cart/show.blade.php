@extends('FrontEnd.master')

@section('title')
    Menu di Keranjang
@endsection

@section('content')

    <div class="products">
        <div class="container">

            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <h4>{{ Session::get('success') }}</h4>
                </div>
            @endif

            @if(Session::has('coupon'))

                {{-- hide coupon field if have coupon--}}
            @else
                <div class="offset-2 col-lg-4 col-md-4 col-sm-4">
                    <form action="{{ route('coupon_apply') }}" method="post">
                        @csrf
                        <div class="card">
                            <h3 class="card-header" style="margin: 5px 0 ">Sudah Punya Kupon?</h3>
                            <div class="card-body">
                                <input type="text" name="coupon_code" class="form-control">
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-success" style="margin: 10px 0" value="Gunakan">
                            </div>
                        </div>
                    </form>
                </div>
            @endif



                                          {{-- Coupon Card --}}

<div class="row">
    <div class=" col-md-4 card text-white bg-danger mb-3" style="max-width: 18rem; margin:50px; margin-top:0px">
  <div class="card-header">Gunakan Kode Ini</div>
  <div class="card-body">
    <h1 class="card-title">SN0123</h1>
    <p class="card-text">Untuk Potongan Harga 5%</p>
  </div>
</div>
<div class="col-md-4  card text-white bg-secondary mb-3" style="max-width: 18rem; margin:50px; margin-top:0px">
  <div class="card-header">Gunakan Kode Ini</div>
  <div class="card-body">
    <h1 class="card-title">SN987</h1>
    <p class="card-text">Untuk Potongan Harga 15%</p>
  </div>
</div>
<div class="col-md-4  card text-white bg-success mb-3" style="max-width: 18rem; ">
  <div class="card-header">Gunakan Kode Ini</div>
  <div class="card-body">
    <h1 class="card-title">SN567</h1>
    <p class="card-text">Untuk Potongan Harga 25%</p>
  </div>
</div>
</div>




            <div class="col-md-9 product-w3ls-right">

                <div class="card">
                    <h3 class="card-header text-center" style="background-color: lightyellow; height: 70px;width: auto">
                        Menu di Keranjang
                    </h3>
                    <div class="card-body">

                        <table class="table table-hover table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Hapus</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                @if(Session::has('coupon'))
                                    <th scope="col">Kupon</th>
                                    <th scope="col">Diskon</th>
                                @else

                                @endif
                                <th scope="col">Harga</th>

                                <th scope="col">Total Harga</th>
                            </tr>

                            </thead>
                            <tbody>
                            @php($i=1)
                            @php($sum=0)
                            @foreach( $CartDish as $dish)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <th scope="row">
                                    <a href="{{ route('remove_item', ['rowId' => $dish->rowId]) }}" type="button" class="btn btn-danger">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </th>

                                <td>{{ $dish->name }}</td>
                                <td><img src="{{ asset($dish->options->image) }}" style="width: 50px; height: 50px; border-radius: 50%"></td>
                                <td>{{ $dish->price }} Ribu</td>

                                @if(Session::has('coupon'))
                                    <td>
                                        <form action="{{ route('update_cart') }}" class="form-inline" method="post">
                                            @csrf
                                            <input type="hidden" name="rowId" value="{{ $dish->rowId }}">
                                            <input type="text" name="qty" value="{{ $dish->qty }}" style="width: 50px; height:25px" minlength="1">
                                            <input type="submit" name="btn" class="btn btn-success" value="Update" style="width: 50px; height:25px;padding: 0; float: right; margin-top: -25px; margin-left: 5px;">
                                        </form>
                                    </td>

                                    <td>
                                        {{ session()->get('coupon')['coupon_code'] }}
                                    </td>
                                    <td>
                                        {{ session()->get('coupon')['coupon_value'] }}%
                                    </td>

                                    <td>
                                        {{ $subTotal= $dish->price*$dish->qty }} Ribu
                                        ( - {{$discount = $subTotal * session()->get('coupon')['coupon_value'] / 100 }Ribu)
                                    </td>

                                    <?php
/*                                        Session::put('discount', $discount);
                                    */?>

                                @else
                                    <td>
                                        <form action="{{ route('update_cart') }}" class="form-inline" method="post">
                                            @csrf
                                            <input type="hidden" name="rowId" value="{{ $dish->rowId }}">
                                            <input type="text" name="qty" value="{{ $dish->qty }}" style="width: 50px; height:25px" minlength="1">
                                            <input type="submit" name="btn" class="btn btn-success" value="Update" style="width: 50px; height:25px;padding: 0;">
                                        </form>
                                    </td>

                                    <td class="form-inline">{{ $subTotal= $dish->price*$dish->qty }} Ribu</td>

                                    <td>{{ $dish->subTotal }}</td>

                                @endif

                                <input type="hidden" value="{{ $sum = $sum + $subTotal }}">

                            </tr>

                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                @if(Session::has('coupon'))
                                    <td></td>
                                    <td></td>
                                    <td class="text-center"> =  {{ $grant = $sum-$discount }} Ribu </td>
                                    <?php
                                        Session::put('sum', $grant);
                                    ?>
                                @else
                                    <td class="text-center"> =  {{ $grant = $sum }} Ribu </td>

                                    <?php
                                        Session::put('sum', $grant);
                                    ?>

                                @endif
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

                <div class="col-md-9 product-w3ls-left">
                    <a href="{{ url('/') }}" class="btn btn-primary" style="float: left">
                        <i class="fa fa-arrow-left"></i>
                        Pesan Lagi<br/>
                    </a>
                </div>

            @if(Session::get('shipping_id') )
                <div class="col-md-9 product-w3ls-right">
                    <a href="{{ url('/checkout/payment') }}" class="btn btn-info" style="float: right">
                        <i class="fa fa-shopping-bag"></i>
                        Bayar
                    </a>
                </div>
            @elseif(Session::get('customer_id'))
                <div class="col-md-9 product-w3ls-right">
                    <a href="{{ url('/shipping') }}" class="btn btn-info" style="float: right">
                        <i class="fa fa-shopping-bag"></i>
                        Bayar
                    </a>
                </div>
            @else

            <div class="col-md-9 product-w3ls-right" title="Please Login First To Continue Your Process">
                <a href="" data-toggle="modal" data-target="#login_or_register" class="btn btn-info" style="float: right">
                    <i class="fa fa-shopping-bag"></i>
                    Bayar
                </a>
            </div>

            @endif

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="login_or_register" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>
                                    Selamat Datang! Di Sate Nusantara
                                </h3>
                                <div class="text-center" style="
                                                                margin-top:25px;
                                                                height: 160px;
                                                                width: 160px;
                                                                border-radius: 50%;
                                                                background-color: darkblue;
                                                                color: ghostwhite;
                                                                padding-top: 65px;
                                                                font-size: 20px">
                                    Diri Anda
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4>Apa Anda Anggota Baru? </h4>
                                <a href="#sigup-modal" data-toggle="modal" class="btn-block btn-primary text-center"
                                   style="
                                            height: 60px;
                                            width: auto;
                                            padding-top: 12px;
                                            margin-top: 25px;
                                            font-size: 25px
                                           ">
                                    <span class="mt-5">Register</span>
                                </a>

                                <h3 class="mt-lg-5 text-center">Atau</h3>

                                <h4 class="mt-5">Sudah Punya Akun? </h4>

                                <a href="#signin-modal" data-toggle="modal" class="btn-block btn-success text-center"
                                   style="
                                            height: 60px;
                                            width: auto;
                                            padding-top: 12px;
                                            margin-top: 10px;
                                            font-size: 25px
                                           ">
                                    <span class="mt-5">Login</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                </div>

            </div>
        </div>
    </div>
@endsection


