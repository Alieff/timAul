@extends('layouts.page')

@section('faqact')
'active'
@endsection
@section('bodycontent')
<div>
  <img src="../resources/assets/images/landing.jpg" class="img-responsive header-image" alt="Responsive image">
</div>


<!-- FAQ -->
<div class="container">
  <div class="page-header ">
    <h1 class="text-center"><small> You have questions, we have answers.</small></h1>
  </div>
  <br>

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
            Apakah saya dapat menggunakan API ini?
          </a>
        </h4>
      </div>
      <div id="collapseFour" class="panel-collapse collapse ">
        <div class="panel-body">
          Ya, bisa. Untuk saat ini InspireCrawler dapat digunakan oleh semua orang yang memiliki akses ke internet.
          Anda juga tidak perlu membuat akun terlebih dahulu untuk menggunakan API. Namun, Anda perlu membaca term of use dari API ini terlebih dahulu.
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
            Darimanakah quotes-quotes yang di-generate oleh API ini?
          </a>
        </h4>
      </div>
      <div id="collapseFive" class="panel-collapse collapse">
        <div class="panel-body">
          Kami mengambil berbagai macam quotes yang berasal dari beberapa websites quotes terpercaya, seperti brainyquotes.
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
            Apakah saya dapat menambahkan quotes ke dalam API?
          </a>
        </h4>
      </div>
      <div id="collapseSix" class="panel-collapse collapse">
        <div class="panel-body">
          Untuk saat ini, pengguna API biasa belum dapat menambahkan quotes secara manual.
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
            Apakah saya dapat melihat contoh penggunaan API ini?
          </a>
        </h4>
      </div>
      <div id="collapseSeven" class="panel-collapse collapse">
        <div class="panel-body">
          Anda dapat melihat contoh dan dokumentasi API di halaman <a href="#">API Overview</a>
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseHeight">
              Masih ada pertanyaan lain?
          </a>
        </h4>
      </div>
      <div id="collapseHeight" class="panel-collapse collapse">
        <div class="panel-body">
          Anda dapat menghubungi tim developer dengan mengisi form yang ada di halaman <a href="{{ URL::route('contact') }}">contact</a>
        </div>
      </div>
    </div>
  </div>
</div>
        <br />


@endsection
