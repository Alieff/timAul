@extends('layouts.page')
@section('termact')
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
          <!--img style="width:100%" src="..\resources\assets\images\landing.jpg" class="img-responsive" alt="Responsive image"-->
          <div class="col-lg-12" style="text-align: left;padding-left: 20px;padding-right: 20px">
                <h2 id="namaku">TERM OF USE</h2>
                <p>
                Proin eleifend odio est, sit amet posuere enim elementum at. Ut vel velit mollis, tincidunt leo et, vehicula mi. Sed turpis tellus, laoreet non sapien nec, lacinia mollis urna. Etiam diam nisl, ultrices nec augue a, ullamcorper venenatis est. Cras et commodo metus. Sed non turpis eget magna porta pellentesque vel sed nisl. Donec egestas viverra sem ac varius. Maecenas mauris nibh, blandit id nisl vitae, dictum varius magna. Sed cursus, lorem a cursus interdum, felis erat iaculis felis, nec ornare mi mi eu turpis. Curabitur id lorem sit amet nisi porttitor facilisis.
                </p>
                <p>
                Fusce ullamcorper efficitur ipsum vulputate accumsan. Integer porta varius neque ut imperdiet. Quisque egestas eleifend diam, pretium dignissim ex maximus et. Nulla et commodo eros, ut pharetra urna. Nam vel sem non ante aliquet imperdiet consectetur eget purus. Nullam leo tellus, luctus vel lacus nec, ornare placerat nisl. Integer quis eros sed turpis posuere commodo. Proin viverra sem id mi volutpat, ut rhoncus
                </p>
          </div>
        </div>
</div>
@endsection