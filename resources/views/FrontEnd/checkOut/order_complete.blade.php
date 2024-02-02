@extends('FrontEnd.master')

@section('title')
    Pesanan | Selesai
@endsection

@section('content')
    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">
                <div class="card">
                    {{-- For show flash message --}}

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <h4>{{ Session::get('success') }}</h4>
                        </div>
                    @endif

                    {{-- // For show flash message --}}

                    <div class="card-body">
                        <h2 class="text-capitalize">Terimakasih untuk pesanan Anda</h2>
                        <p>Kami Akan Menghubungi Anda Sesegera Mungkin</p>
                        <a href="{{ url('/') }}" class="btn btn-info">
                            Lanjut Berbelanja
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
