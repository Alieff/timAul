@extends('layouts.page')
@section('docact')
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
                    <a href="documentation">Documentation</a>
                </li>
                <li>
                    <a href="apioverview">API Overview</a>
                </li>
                <li>
                    <a href="sourcecode">Source Code</a>
                </li>
                <li>
                    <a class="active" href="termofuse">Term of Use</a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
          <div class="col-lg-12" style="text-align: left;padding-left: 20px;padding-right: 20px">
                <h2 id="namaku">DOCUMENTATION</h2>
                <p>
                Inilah dokumentasi yang dapat membantu Anda untuk menggunakan API kami. Terdapat beberapa penjelasan dari tiap bagian yang ada.
                </p>
          </div>
		  <div class="col-lg-12" style="text-align: left;padding-left: 20px;padding-right: 20px">
                <h2 id="namaku">QUOTE</h2>
                <p>
                Anda dapat mencari berbagai macam kategori dari quote sesuai kebutuhan. Jika ingin mendapatkan quote secara acak berdasarkan jumlah yang diinginkan, Anda dapat melihat halaman Mendapatkan Quote <a href="apidocjs/#api-Quote-getQuoteBySource
">acak</a> . Begitu juga jika Anda ingin mencari quote berdasarkan <a href="apidocjs/#api-Quote
apidocjs/#api-Quote-GetQuoteByAuthor">penulis</a> dan sumber 
                </p>
          </div>
		  <div class="col-lg-12" style="text-align: left;padding-left: 20px;padding-right: 20px">
                <h2 id="namaku">SOURCE CODE</h2>
                <p>
                Source Code dari program crawler kami dapat Anda nikmati dengan lisensi gratis. Produk <i> open source </i>ini dapat anda gunakan atau distribusikan kepada siapa saja. Pada halaman <i> source code </i> Anda dapat menemukan kode sumber dari program <i> crawler </i> melalui tombol <i> source code </i> dan dokumentasi dari tiap kelas yang digunakan melalui tombol <strong> javadoc </strong>.
                </p>
          </div>
        </div>
</div>
@endsection