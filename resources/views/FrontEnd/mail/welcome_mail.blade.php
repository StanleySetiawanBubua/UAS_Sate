<div class="card">
    <div class="card-body">
        <table class="table-borderless">
            <tr>
                <td>Kepada <strong>{{ $name }}</strong></td>
            </tr>
            <tr>
                <td>Id Pesananmu: <strong>{{ $order_id.''.'-'.''.rand(111,999) }}</strong></td>
            </tr>
            <tr>
                <td>Total Harga: <strong>{{ $total ?? '' }}Ribu</strong></td>
            </tr>
            <tr>
                <td>Nomor HP: <strong>{{ $number ?? '' }}</strong></td>
            </tr>
            <tr>
                <td>Alamat Pengiriman: <strong>{{ $address ?? '' }}</strong></td>
            </tr>
            <tr>
                <td>Terimakasih Sudah Memesan </td>
            </tr>
            <tr>
                <td>Tetap terhubung dengan kami</td>
            </tr>
            <tr><td>Klik link ini untuk memesan lebih lanjut:<a href="{{ url('/') }}">Click to more</a></td></tr>
            <tr>
                <td>Salam,</td>
            </tr>
            <tr>
                <td>Sate Nusantara</td>
            </tr>
        </table>
    </div>
</div>
