
    <div class="modal fade" id="sigup-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-header text-center">
                        Selamat Datang di Sate Nusantara
                        <strong class="text-center">
                            Sign Up untuk membuat akun Anda
                        </strong>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="login-page about">
                        <img class="login-w3img" style="" src="{{ asset('/') }}frontEndSourceFile/images/img3.jpg" alt="">
                        <div class="login-agileinfo">
                            <form action="{{ route('store_customer') }}" method="post">
                                @csrf
                                <input class="agile-ltext" type="text" name="name" placeholder="Masukkan Nama Anda" required="">
                                <input class="agile-ltext" type="email" name="email" placeholder="Masukkan Email Anda" required="">
                                <input class="agile-ltext" type="text" name="phone_no" placeholder="Masukkan Nomor Telepon Anda" required="">
                                <input class="agile-ltext" type="password" name="password" placeholder="Password" required="">
                                <div class="wthreelogin-text">
                                    <ul>
                                        <li>
                                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>
                                                <span> Saya setuju dengan syarat dan ketentuan layanan</span>
                                            </label>
                                        </li>
                                    </ul>
                                    <div class="clearfix"> </div>
                                </div>
                                <input type="submit" value="Sign Up">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

