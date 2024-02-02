@extends('FrontEnd.master')

@section('title')
    ATM | Pembayaran
@endsection

@section('content')

    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">
                <div class="card">

                    <h1 class="card-title">Terimakasih Sudah Membeli Produk Kami</h1>
                    <div class="card-body">
                        <hr>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header text-truncate" style="font-size: 28px">Pesanan Anda Telah Disiapkan</div>
                                <div class="card-body">
                                    <strong class="text-bold" style="font-size: 20px">Total yang perlu Anda bayar adalah
                                        @if(Session::get('sum') ==null)
                                             00 Ribu
                                        @else
                                            Rp. {{ Session::get('sum') }} Rupiah.
                                        @endif
                                    </strong>
                                    <br>
                                    <strong style="font-size: 20px">Silakan lakukan pembayaran dengan memasukkan kartu Kredit atau Debit Anda.</strong>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" style="background-color: whitesmoke">
                            <div class="card">
                                <div class="card-body">
                                    <script src="https://js.stripe.com/v3/"></script>
                                    <div class="card-header text-capitalize text-truncate" style="font-size: 28px">Masukkan Info Kartu Anda dengan Hati-hati.</div>
                                    <form role="form" action="{{ route('stripe.payment') }}"
                                          method="post" data-cc-on-file="false"
                                          data-stripe-publishable-key="{{ env('pk_test_51HTKp9BuTVgAN0HdkZKLw4srvSIMG4QK6RvogtcoVg067evXuKEmpuis1Ki4pFDC5UjvbCEhnKFJLoLpdNLLAkkA00Pw8Vr0pc') }}"
                                            id="payment-form">

                                        @csrf

                                        <div class="form-row">
                                            <label>
                                                Nama Anda
                                            </label>
                                            <input type="text" name="name" placeholder="Nama" class="form-control">
                                            <label>
                                                Jumlah Anda
                                            </label>
                                            <input type="text" name="grandTotal" placeholder="Isi jumlah Anda" class="form-control">

                                            <label for="card-element">
                                                Kartu Debit atau Kredit
                                            </label>
                                            <div id="card-element">
                                                <!-- A Stripe Element will be inserted here. -->
                                            </div>
                                            <!-- Used to display form errors. -->
                                            <div id="card-errors" role="alert"></div>
                                        </div>
                                        <button class="btn btn-success mb-2" style="float: right; margin-top: 8px;margin-bottom: 8px;">Kirim Pembayaran</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51HTKp9BuTVgAN0HdkZKLw4srvSIMG4QK6RvogtcoVg067evXuKEmpuis1Ki4pFDC5UjvbCEhnKFJLoLpdNLLAkkA00Pw8Vr0pc');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>

@endsection
