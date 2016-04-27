@extends('layouts.page')
@section('documentationact')
'active'
@endsection
@section('bodycontent')
<div id="wrapper"><!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                    </a>
                </li>
                <li>
                    <a href="#">Documentation</a>
                </li>
                <li>
                    <a href="#">API Overview</a>
                </li>
                <li>
                    <a href="#">Source Code</a>
                </li>
                <li>
                    <a class="active" href="#">Term of Use</a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
			<div class="col-lg-12" style="text-align: left;padding-left: 20px;padding-right: 20px">
                <h2 id="namaku">DOCUMENTATION</h2>                									
				<p>
				Inilah dokumentasi yang dapat membantu Anda untuk menggunakan API kami. Terdapat beberapa penjelasan dari tiap bagian yang ada.
				</p>
			

			
				<h2 id="namaku">QUOTE</h2>                									
				<p>
				Anda dapat mencari berbagai macam kategori dari quote sesuai kebutuhan. Jika ingin mendapatkan quote secara acak berdasarkan jumlah yang diinginkan, Anda dapat melihat halaman Mendapatkan Quote Acak (di-link). Begitu juga jika Anda ingin mencari quote berdasarkan penulis (di-link) dan sumber 
				</p>
			

			
				<h2 id="namaku">SOURCE CODE</h2>                									
				<p>
				Source Code dari program crawler kami dapat Anda nikmati dengan lisensi gratis. Produk open source ini dapat anda gunakan atau distribusikan kepada siapa saja. Pada halaman source code Anda dapat menemukan source code dari program dan API.
				</p>
			</div>
					
		</div>
</div>

@endsection