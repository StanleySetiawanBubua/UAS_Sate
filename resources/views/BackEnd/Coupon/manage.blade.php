@extends('BackEnd.master')
@section('title')
    Atur Kupon
@endsection
@section('content')

    {{-- for display message --}}

    @if(Session::get('sms'))
        <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
            <strong>{{ Session::get('sms') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{-- end message --}}

    <div class="card my-5">

        <div class="card-header">
            <h5 class="fw-bold text-center">Atur Kupon</h5><br>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>

                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Tipe</th>
                    <th>Nilai</th>
                    <th>Minimum Beli</th>
                    <th>Kadaluwarsa</th>
                    <th>Ditambah Pada</th>
                    <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>

                @php($i = 1)

                @foreach($coupons as $code)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                            {{ $code->coupon_code }}
                        </td>
                        <td>

                            @if($code->coupon_type == 1)
                                Percentage
                            @else
                                Fixed
                            @endif
                        </td>
                        <td>
                            {{ $code->coupon_value }}
                        </td>
                        <td>
                            {{ $code->cart_min_value }}
                        </td>
                        <td>
                            {{ $code->expired_on }}
                        </td>
                        <td>
                            {{ $code->added_on }}
                        </td>
                        <td>

                            @if($code->coupon_status == 1)
                                <a class="btn btn-outline-success" href="{{ route('inactive_coupon_code',['coupon_id'=>$code->coupon_id]) }}">
                                    <i class="fas fa-arrow-up" title="Click to Inactive"></i>
                                </a>
                            @else
                                <a class="btn btn-outline-info" href="{{ route('active_coupon_code',['coupon_id'=>$code->coupon_id]) }}">
                                    <i class="fas fa-arrow-down" title="Click to Active"></i>
                                </a>
                            @endif
                            <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#edit{{ $code->coupon_id }}" >
                                <i class="fas fa-edit" title="Click to change it"></i>
                            </a>
                            <a class="btn btn-outline-danger" href="{{ route('delete_coupon_code',['coupon_id'=>$code->coupon_id]) }}">
                                <i class="fas fa-trash" title="Click to destroy"></i>
                            </a>
                        </td>
                    </tr>
                    {{-- ============================================= modal start here ======================================================= --}}

                    <div class="modal fade" id="edit{{ $code->coupon_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


                        <div class="modal-dialog" role="document">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <h5 class="modal-title">Update Kode Kupon</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('update_coupon_code') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="coupon_code" value="{{ $code->coupon_code }}">
                                            <input type="hidden" class="form-control" name="coupon_id" value="{{ $code->coupon_id }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Nilai Kupon</label>
                                            <input type="text" class="form-control" name="coupon_value" value="{{ $code->coupon_value }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Minimum Pembelian</label>
                                            <input type="text" class="form-control" name="cart_min_value" value="{{ $code->cart_min_value }}">
                                        </div>
                                       {{-- <div class="form-group">
                                            <label>Tipe Kupon</label>
                                            <div class="radio">
                                                @if($code->coupon_type == 1)

                                                    <input type="checkbox" name="coupon_type" value="1">Persentase
                                                @else

                                                    <input type="checkbox" name="coupon_type" value="0">Tetap
                                                @endif


                                            </div>
                                        </div>--}}
                                        <div class="form-group">
                                            <label>Pilih Tipe Kupon</label>
                                            <div class="radio">
                                                <input type="radio" name="coupon_type"  value="1">Persentase
                                            </div>
                                            <input type="radio" name="coupon_type" value="0">Kupon
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="btn" class="btn btn-primary" value="Update">
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                    {{-- ============================================= modal end here ========================================================== --}}
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
