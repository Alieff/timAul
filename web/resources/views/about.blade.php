@extends('layouts.page')
@section('aboutact')
'active'
@endsection
@section('bodycontent')
<img src="landing.jpg" class="img-responsive header-image" alt="Responsive image">
<div class="row line">
	<div class="col-lg-10 col-lg-offset-1">
		<h2>ABOUT API</h2>
		<p>
			Inspire Crawler adalah sebuah API yang bisa anda gunakan ketika membutuhkan data-data berupa quote. Produk ini dibuat karena kebutuhan orang-orang untuk mencari quote baik itu sebagai motivasi diri maupun sisipan dalam sebuah publikasi. Oleh karena itu, Inspire Crawler hadir agar orang-orang yang membutuhkan ini dapat mendapatkan hasil yang maksimal sesuai harapan (quote yang tepat sesuai kategori pilihan, dsb).
		</p>
	</div>
</div>

<div class="row line">
	<div id="team">
		<div class="col-lg-10 col-lg-offset-1">
			<h2>Developer Team</h2>
			<div>
				<div class="foto">
					<a target="_blank" href="auliachair.tumblr.com">
						<img class="img" src="aul.jpg">
					</a>
					<div class="desc">
						<div>Aulia</div>
						<div>Scrum Master</div>
					</div>
				</div>
				<div class="foto fotop">
					<a target="_blank" href="#">
						<img class="img" src="puti.jpg">
					</a>
					<div class="desc">
						<div>Puti</div>
						<div>Designer</div>
					</div>
				</div>													
			</div>				
		</div>
	</div>
	<div id="team2">
		<div class="col-lg-10 col-lg-offset-1">			
			<div>
				<div class="foto">
					<a target="_blank" href="#">
						<img class="img" src="ega.jpg">
					</a>
					<div class="desc">
						<div>Ega</div>
						<div>Designer</div>
					</div>
				</div>
				<div class="foto fotop">
					<a target="_blank" href="#">
						<img class="img" src="haryo.jpg">
					</a>
					<div class="desc">
						<div>Haryo</div>
						<div>Hacker</div>
					</div>				
				</div>				
				<div class="foto fotoe">
					<a target="_blank" href="#">
						<img class="img" src="alief.jpg">
					</a>
					<div class="desc">
						<div>Alief</div>
						<div>Hacker</div>
					</div>
				</div>
			</div>			
		</div>	
	</div>
</div>
@endsection