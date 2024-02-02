@extends('BackEnd.master')

@section('title')
    Order Detail
@endsection

@section('content')

    <div class="offset-2 col-md-8">

        <div class="card my-5">

            <div class="card-header">
                <h1 class="text-center text-muted">Customer Info For This Order</h1>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $customer->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $customer->email }}</td>
                    </tr>
                    <tr>
                        <th> Nomor Telepon</th>
                        <td>{{ $customer->phone_no }}</td>
                    </tr>

                </table>
            </div>
        </div>
            <!-- /.card-body -->
        <div class="card my-5">

            <div class="card-header">
                <h1 class="text-center text-muted">Info Detail Pesanan Untuk Pesanan Ini</h1>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th>No Pesanan</th>
                        <td>{{ $order->order_id }}</td>
                    </tr>
                    <tr>
                        <th>Total Pesanan</th>
                        <td>{{ $order->order_total }}</td>
                    </tr>
                    <tr>
                        <th> Status Pesanan</th>
                        <td>{{ $order->order_status }}</td>
                    </tr>

                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card my-5">

            <div class="card-header">
                <h1 class="text-center text-muted">Info Pengiriman Untuk Pesanan Ini</h1>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $shipping->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $shipping->email }}</td>
                    </tr>
                    <tr>
                        <th> Nomor Telepon</th>
                        <td>{{ $shipping->phone_no }}</td>
                    </tr>
                    <tr>
                        <th> Alamat</th>
                        <td>{{ $shipping->address }}</td>
                    </tr>

                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card my-5">

            <div class="card-header">
                <h1 class="text-center text-muted">Info Pembayaran Untuk Pesanan Ini</h1>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th>Tipe Bayar</th>
                        <td>{{ $payment->payment_type }}</td>
                    </tr>
                    <tr>
                        <th>Status Bayar</th>
                        <td>{{ $payment->payment_status }}</td>
                    </tr>

                </table>
            </div>
        </div>
            <!-- /.card-body -->
        <div class="card my-5">

            <div class="card-header">
                <h1 class="text-center text-muted">Info Detail Hidangan Untuk Pesanan Ini</h1>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>

                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                    </tr>
                    </thead>
                    <tbody>

                    @php($i = 1)

                    @foreach($order_details as $orderD)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>
                                {{ $orderD->dish_id }}
                            </td>
                            <td>
                                {{ $orderD->dish_name }}
                            </td>

                            <td title="original price/without coupon">
                                {{ $orderD->dish_price }} TK
                            </td>

                            <td>
                                {{ $orderD->dish_qty }}
                            </td>
                            <td title="original price/without coupon">
                                {{ $orderD->dish_price * $orderD->dish_qty}} Tk
                            </td>

                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->

    </div>

@endsection
