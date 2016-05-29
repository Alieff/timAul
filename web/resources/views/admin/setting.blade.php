<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="../../node_modules/chart.js/dist/Chart.js"></script>
    <script src="../../node_modules/chart.js/dist/Chart.min.js"></script>
    <title>Admin Inspire Crawler</title>
    <link rel="stylesheet" href="../../resources/assets/css/templateInspire.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="../../resources/assets/css/admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../resources/assets/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="../../resources/assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../resources/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../resources/assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../../resources/assets/bower_components/raphael/raphael-min.js"></script>
    <!--script src="../../resources/assets/bower_components/morrisjs/morris.min.js"></script-->
    <script src="../../resources/assets/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../resources/assets/js/sb-admin-2.js"></script>

    <style type="text/css">
        .center{
            text-align: center;
        }

        .log{
            color: white;
            background-color: grey;
            overflow-y: scroll; 
            height: 250px;
        }

        .crawler{
            color: white;
            background-color: grey;
        }
    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation" style="">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="logo" class="navbar-brand" href="#">InspireCrawler</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul id="test" class="nav navbar-nav navbar-right">
                     @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/help') }}">Help</a></li>
                    @else
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="CRUD"><i class="fa fa-table fa-fw"></i> CRUD</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <br>
        <br>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Settings Crawler</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-lg-8">
                @if(Session::has('message'))
                    <div class="alert alert-info">
                    {{Session::get('message')}}
                    </div>
                @endif

                {!! Form::open(array('route' => 'setting_store', 'class' => 'form')) !!}
                        <div class="form-group {!! $errors->has('page_number') ? 'has-error' : '' !!}">
                          <label for="page_number">Page Number</label>
                          <input type="text" class="form-control" id="page_number" name="page_number" value= {!!$data->getPageNumber()!!} >
                          {!! $errors->first('page_number', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('crawl_depth') ? 'has-error' : '' !!}">
                          <label for="crawl_depth">Crawl Depth</label>
                          <input type="text" class="form-control" id="crawl_depth" name="crawl_depth" value= {!!$data->getCrawlDepth()!!}>
                          {!! $errors->first('crawl_depth', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('proxy') ? 'has-error' : '' !!}">
                          <label for="proxy">Proxy</label>
                          <input type="text" class="form-control" id="proxy" name="proxy" value= {!!$data->getProxy()!!}>
                          {!! $errors->first('proxy', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('resumable') ? 'has-error' : '' !!}">
                          <label for="resumable">isResumable (true or false)</label><br>
                          <input type="text" class='form-control' id="resumable" name="resumable" value= {!!$data->getIsResumable()!!}>
                          {!! $errors->first('resumable', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('web') ? 'has-error' : '' !!}">
                          <label for="web">Web</label>
                          <textarea type="text" class="form-control" name="web" id="web">{!!$data->getWeb()!!}
                          </textarea>
                          {!! $errors->first('web', '<p class="help-block">:message</p>') !!}
                        </div>

                        <button type="submit" class="btn btn-default">Save</button>
                {!! Form::close() !!}
                <br>
                <br>
                <br>
                <br>
                <br>
              </div>

              <a href=
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
</body>
</html>