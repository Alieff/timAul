<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Inspire Crawler</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="../resources/assets/css/admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../assets/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>      
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Inspire Crawler</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

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
                {!! Form::open(array('route' => 'setting_store', 'class' => 'form')) !!}
                        <div class="form-group {!! $errors->has('page_number') ? 'has-error' : '' !!}">
                          <label for="page_number">Page Number</label>
                          <input type="text" class="form-control" id="page_number" value= {!!$data['page_number']!!} >
                          {!! $errors->first('page_number', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('crawl_depth') ? 'has-error' : '' !!}">
                          <label for="crawl_depth">Crawl Depth</label>
                          <input type="text" class="form-control" id="crawl_depth" value= {!!$data['crawl_depth']!!}>
                          {!! $errors->first('crawl_depth', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('proxy') ? 'has-error' : '' !!}">
                          <label for="proxy">Proxy</label>
                          <input type="text" class="form-control" id="proxy" value= {!!$data['proxy']!!}>
                          {!! $errors->first('proxy', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('resumable') ? 'has-error' : '' !!}">
                          <label for="resumable">Resumable</label><br>
                          <input type="text" class='form-control' id="resumable" value= {!!$data['resumable']!!}>
                          {!! $errors->first('resumable', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('web') ? 'has-error' : '' !!}">
                          <label for="web">Web</label>
                          <textarea type="text" class="form-control" id="web">{!!$data['web_address']!!}
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