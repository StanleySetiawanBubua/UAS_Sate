@extends('FrontEnd.master')

@section('title')
    Hubungi Kami
@endsection

@section('content')


<!-- breadcrumb -->
	<div class="container">
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
			<li class="active">Hubungi Kami</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- contact -->
	<div id="contact" class="contact cd-section">
		<div class="container">
			<h3 class="w3ls-title">Hubungi Kami</h3>
			<p class="w3lsorder-text">Jangan ragu untuk menghubungi kami kapan saja. </p>
			<div class="contact-row agileits-w3layouts">
				<div class="col-xs-6 col-sm-6 contact-w3lsleft">
					<div class="contact-grid agileits">
						<h4>Kami senang mendengar dari Anda! Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan, saran, atau masukan. Tim kami siap membantu Anda dengan layanan yang ramah dan responsif. Silakan hubungi kami melalui formulir kontak di situs web ini atau melalui informasi kontak yang tercantum di bawah ini. Kami berharap dapat berkomunikasi dengan Anda segera!</h4><br><br>
						<form action="#" method="post">
							<input type="text" name="Name" placeholder="Nama" required="">
							<input type="email" name="Email" placeholder="Email" required="">
							<input type="text" name="Phone Number" placeholder="Nomor Telepon" required="">
							<textarea name="Message" placeholder="Pesan..." required=""></textarea>
							<input type="submit" value="Kirim" >
						</form>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 contact-w3lsright">
					<h6><span>Sate Nusantara </span>Anda juga dapat mengubungi kami dengan cara berikut: </h6>
					<div class="address-row">
						<div class="col-xs-2 address-left">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						</div>
						<div class="col-xs-10 address-right">
							<h5>Kunjungi Kami</h5>
							<p>Bandung </p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row w3-agileits">
						<div class="col-xs-2 address-left">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-xs-10 address-right">
							<h5>Email Kami</h5>
							<p><a href="mailto:info@example.com"> SateNusantara@gmail.com</a></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row">
						<div class="col-xs-2 address-left">
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
						</div>
						<div class="col-xs-10 address-right">
							<h5>Telepon Kami</h5>
							<p>+086579373628</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- map -->
		<div class="map agileits">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.948805392833!2d-73.99619098458929!3d40.71914347933105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a27e2f24131%3A0x64ffc98d24069f02!2sCANADA!5e0!3m2!1sen!2sin!4v1479793484055"></iframe>

            {{-- <iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/view?key=AIzaSyAJifc7pwvUkN0yrtn7BPn8I-lRg33PSNc&center=24.3333333,91&zoom=12&maptype=satellite" style="border:1px solid #000;"></iframe><a href="http://www.maplandia.com/bangladesh/dhaka-div/kishoreganj-zl/gazipur/" title="google satellite map of Gazipur">Gazipur google map</a> --}}
		</div>
		<!-- //map -->
	</div>
	<!-- //contact -->


    @endsection
