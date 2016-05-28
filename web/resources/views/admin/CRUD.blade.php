<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        .center {
            text-align: center;
        }
        .log {
            color: white;
            background-color: grey;
            overflow-y: scroll;
            height: 250px;
        }
        .crawler {
            color: white;
            background-color: grey;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

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
                        <li><a href="{{ url('/login') }}">Login</a>
                        </li>
                        <li><a href="{{ url('/help') }}">Help</a>
                        </li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- /.navbar-top-links -->

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
                    <h1 class="page-header">Quotes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            @if (Session::has('flash'))
              <div class="flash alert">
                <p>{{ Session::get('message') }}</p>
              </div>
            @endif
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-search" aria-hidden="true">Search</i>
                            <div class="pull-right">

                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    {!! Form::open(array('route' => 'admin.getquotes', 'class' => 'form-horizontal', 'method' => 'get')) !!}

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                {!! Form::label('Quote',null,array('class' => 'col-sm-2 col-lg-2 control-label')) !!}
                                                <div class="col-sm-10 col-lg-10">
                                                    {!! Form::text('quote', null, array('class'=>'form-control', 'placeholder'=>'Substring of quote you want to find')) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('Author',null,array('class' => 'col-sm-2 control-label')) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('author', null, array('class'=>'form-control', 'placeholder'=>'Substring of author you want to find')) !!}
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        {!! Form::label('source',null,array('class' => 'col-sm-2 control-label')) !!}
                                        <div class="col-sm-10">

                                            {!! Form::text('source', null, array('class'=>'form-control', 'placeholder'=>'Substring of source you want to find')) !!}
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('Sort By',null,array('class' => 'col-sm-2 control-label')) !!}
                                        <div class="col-sm-10">

                                            {!! Form::select('sort', array('_id' => 'Id', 'quote' => 'Quote','author' => 'Author', 'source' => 'Source'), 'id') !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('with',null,array('class' => 'col-sm-2 control-label')) !!}
                                            <div class="col-sm-2">

                                                <p>{!! Form::radio('sortby','asc',true) !!} Ascending</p>
                                                <p>{!! Form::radio('sortby','desc') !!} Descending</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                {!! Form::submit('Find', array('class'=>'btn btn-primary')) !!}
                                            </div>
                                        </div>
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-list-alt" aria-hidden="true"></i> Quotes
                            <div class="pull-right">

                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 center">
                                    @if( !empty($quotes))
                                    <table cellspacing="0" class="table">
                                        <tr>
                                            <th class="center">_id</th>
                                            <th class="center">Quote</th>
                                            <th class="center">Author</th>
                                            <th class="center">Source</th>
                                            <th class="center">Category</th>
                                            <th class="center">Manual?</th>
                                            <th class="hidden"></th>
                                        </tr>
                                        @foreach($quotes as $quote)
                                        <tr>
                                            <td> {{ $quote->_id }}</td>
                                            <td> {{ $quote->quote }}</td>
                                            <td> {{ $quote->author }}</td>
                                            <td> {{ $quote->source }}</td>
                                            <td>
                                                <?php $category=$quote->category; if($category == null) { echo 'Not set'; } else { echo $quote->category; } ?>
                                            </td>
                                            <td>
                                                <?php $isManual=$quote->isManual; if($isManual == null) { echo 'No'; } else { echo $quote->isManual; } ?>
                                            </td>
                                            <td>
                                                <!--  HOW TO GET QUOTE ID: $quote->_id -->

                                                   <!-- <a class="glyphicon glyphicon-pencil" href="{{ URL::to('admin/CRUD/' . $quote->id . '/edit') }}"></a> -->

                                                   {!! Form::open(array('route' => ['admin.edit',$quote->_id], 'class' => 'form-horizontal', 'method' => 'get')) !!} 
                                                    {!! Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('type' => 'submit')) !!} {!! Form::close() !!}


                                                <script>
                                                    function ConfirmDelete() {
                                                        var x = confirm("Are you sure you want to delete?");
                                                        if (x)
                                                            return true;
                                                        else
                                                            return false;
                                                    }
                                                </script>

                                                {!! Form::open(array('route' => 'admin.deletequotes', 'class' => 'form-horizontal', 'method' => 'get', 'onsubmit' => 'return ConfirmDelete()')) !!} {!! Form::hidden('_id', $quote->_id, ['class' => 'form-control']) !!} {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit')) !!} {!! Form::close() !!}

                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>

                                    {!! $quotes->render() !!} @else
                                    <h1><i>No Such Quote</i></h1> @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
</body>

</html>