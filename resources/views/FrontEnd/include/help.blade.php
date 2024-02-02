@extends('FrontEnd.master')

@section('title')
    Bantuan
@endsection

@section('content')



<!-- breadcrumb -->
	<div class="container">
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
			<li class="active">Bantuan</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- help-page -->
	<div class="help about">
		<div class="container">
			<h3 class="w3ls-title w3ls-title1">Ada Yang Bisa Kami Bantu?</h3>
			<div class="faq-w3agile">
				<h5>Top 5 Pertanyaan yang Sering Diajukan (FAQ)</h5>
				<ul class="faq">
					<li class="item1"><a href="#" title="click here">Apa menu spesial yang ditawarkan oleh Sate Nusantara?</a>
						<ul>
							<li class="subitem1"><p>Kami memiliki berbagai pilihan sate spesial, termasuk sate ayam, sate kambing, dan sate sapi. Juga, jangan lewatkan sate padang dan sate lilit khas Bali kami!</p></li>
						</ul>
					</li>
					<li class="item2"><a href="#" title="click here">Bagaimana cara memesan di Sate Nusantara?</a>
						<ul>
							<li class="subitem1"><p> Anda dapat memesan langsung di restoran kami, melalui telepon, atau menggunakan platform pemesanan online kami. Kunjungi situs web kami atau hubungi kami untuk detail lebih lanjut. </p></li>
						</ul>
					</li>
					<li class="item3"><a href="#" title="click here">Apakah Sate Nusantara menerima pemesanan untuk acara khusus atau katering?</a>
						<ul>
							<li class="subitem1"><p> Ya, kami menyediakan layanan katering untuk berbagai acara, seperti pesta ulang tahun, acara pernikahan, dan rapat bisnis. Silakan hubungi kami untuk informasi lebih lanjut. </p></li>
						</ul>
					</li>
					<li class="item4"><a href="#" title="click here">Apa kebijakan pengembalian atau penggantian di Sate Nusantara?</a>
						<ul>
							<li class="subitem1"><p>Kami memiliki kebijakan pengembalian uang penuh jika pesanan Anda tidak memenuhi harapan Anda atau terdapat masalah kualitas. Silakan hubungi kami dalam waktu 24 jam setelah penerimaan pesanan untuk proses pengembalian.</p></li>
						</ul>
					</li>
					<li class="item5"><a href="#" title="click here">Apakah Sate Nusantara menyediakan opsi pengiriman atau layanan antar?</a>
						<ul>
							<li class="subitem1"><p>Ya, kami menyediakan layanan pengiriman dan antar. Anda dapat memesan melalui aplikasi pengiriman makanan atau menghubungi kami secara langsung untuk pengaturan pengiriman ke lokasi Anda.</p></li>
						</ul>
					</li>

				</ul>
				<!-- script for tabs -->
				<script type="text/javascript">
					$(function() {

						var menu_ul = $('.faq > li > ul'),
							   menu_a  = $('.faq > li > a');

						menu_ul.hide();

						menu_a.click(function(e) {
							e.preventDefault();
							if(!$(this).hasClass('active')) {
								menu_a.removeClass('active');
								menu_ul.filter(':visible').slideUp('normal');
								$(this).addClass('active').next().stop(true,true).slideDown('normal');
							} else {
								$(this).removeClass('active');
								$(this).next().stop(true,true).slideUp('normal');
							}
						});

					});
				</script>
				<!-- script for tabs -->
			</div>
			<div class="help-search">
				<h5>Anda dapat mencantumkan diri dan kami akan menghubungi Anda:</h5>
				<form action="#" method="post">
					<input type="search" name="Search" placeholder="Email" required="">
					<button type="submit" class="btn btn-default" aria-label="Left Align">
						Kirim
					</button>
				</form>
			</div>
		</div>
	</div>

	<!-- //help-page -->




 @endsection
