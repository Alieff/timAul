<!DOCTYPE html>
<html lang="en">

<head>
<<<<<<< HEAD

    <meta charset="utf-8">
=======
<meta charset="utf-8">
>>>>>>> c5144c80a5d555a61c77fcfbbf6a06848cdce4bf
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<<<<<<< HEAD

    <title>Admin Inspire Crawler</title>
=======
    <script src="../../node_modules/chart.js/dist/Chart.js"></script>
    <script src="../../node_modules/chart.js/dist/Chart.min.js"></script>
    <title>Admin Inspire Crawler</title>
    <link rel="stylesheet" href="../../resources/assets/css/templateInspire.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
>>>>>>> c5144c80a5d555a61c77fcfbbf6a06848cdce4bf

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Custom CSS -->
<<<<<<< HEAD
    <link href="../resources/assets/css/admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../assets/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css" rel="stylesheet">
=======
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
>>>>>>> c5144c80a5d555a61c77fcfbbf6a06848cdce4bf

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
<<<<<<< HEAD
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

=======
>>>>>>> c5144c80a5d555a61c77fcfbbf6a06848cdce4bf
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
<<<<<<< HEAD
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
=======
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation" style="">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
>>>>>>> c5144c80a5d555a61c77fcfbbf6a06848cdce4bf
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
<<<<<<< HEAD
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
=======
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
>>>>>>> c5144c80a5d555a61c77fcfbbf6a06848cdce4bf

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
<<<<<<< HEAD
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
=======
                            <a href="dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> CRUD</a>
>>>>>>> c5144c80a5d555a61c77fcfbbf6a06848cdce4bf
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<<<<<<< HEAD

=======
        <br>
        <br>
>>>>>>> c5144c80a5d555a61c77fcfbbf6a06848cdce4bf
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
<<<<<<< HEAD
                            <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
=======
                            <i class="fa fa-bar-chart-o fa-fw"></i> Statistic
>>>>>>> c5144c80a5d555a61c77fcfbbf6a06848cdce4bf
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
<<<<<<< HEAD
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
=======
                                        <li><a href="#">Quotes</a>
                                        </li>
                                        <li><a href="#">Request</a>
                                        </li>
                                        <li><a href="#">Post</a>
                                        </li>
                                        <!--li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li-->
>>>>>>> c5144c80a5d555a61c77fcfbbf6a06848cdce4bf
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
<<<<<<< HEAD
                            <div id="morris-area-chart"></div>
=======
                                <canvas id="apistat" width="500" height="150"></canvas>
                                <script>
                                var ctx = document.getElementById("apistat");
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: ["01 May 2016", "02 May 2016", "03 May 2016", "04 May 2016", "05 May 2016", "06 May 2015", "07 May 2016"],
                                        datasets: [{
                                            label: 'Number of Quotes in the Database',
                                            data: [4, 20, 22, 22, 35, 33, 150],
                                            fill: false,
                                            lineTension: 0.1,
                                            backgroundColor: "rgba(75,192,192,0.4)",
                                            borderColor: "rgba(75,192,192,1)",
                                            borderCapStyle: 'butt',
                                            borderDash: [],
                                            borderDashOffset: 0.0,
                                            borderJoinStyle: 'miter',
                                            pointBorderColor: "rgba(75,192,192,1)",
                                            pointBackgroundColor: "#000",
                                            pointBorderWidth: 1,
                                            pointHoverRadius: 5,
                                            pointHoverBackgroundColor: "rgba(75,192,192,1)",
                                            pointHoverBorderColor: "rgba(220,220,220,1)",
                                            pointHoverBorderWidth: 2,
                                            pointRadius: 1,
                                            pointHitRadius: 10,
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero:true
                                                }
                                            }]
                                        }
                                    }
                                });
                                </script>
>>>>>>> c5144c80a5d555a61c77fcfbbf6a06848cdce4bf
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->

                        <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-cogs fa-fw"></i> Crawler Controller
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs">
                                        Settings
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 center">
                                    <button><i class="fa fa-play-circle fa-fw fa-4x"></i></button>
                                    <button href="#"><i class="fa fa-stop-circle fa-fw fa-4x"></i></button>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body crawler">
                                            crawling is running....
                                        </div>
                                    </div>
                                    <br>

                                    <span class="center">Crawler's Log</span>
                                    <div class="panel panel-default">
                                        <div class="panel-body log">
                                            crawling....
                                            <br>
                                            Quote : "If there's a will there's a way"
                                            Author : John Doe
                                            Source : www.getfreequotes.com
                                            <br>
                                            Quote : "If there's a will there's a way"
                                            Author : John Doe
                                            Source : www.getfreequotes.com
                                            <br>
                                            Quote : "If there's a will there's a way"
                                            Author : John Doe
                                            Source : www.getfreequotes.com
                                            <br>
                                            Quote : "If there's a will there's a way"
                                            Author : John Doe
                                            Source : www.getfreequotes.com
                                            <br>
                                            Quote : "If there's a will there's a way"
                                            Author : John Doe
                                            Source : www.getfreequotes.com
                                            <br>
                                            Quote : "If there's a will there's a way"
                                            Author : John Doe
                                            Source : www.getfreequotes.com
                                            <br>
                                            Quote : "If there's a will there's a way"
                                            Author : John Doe
                                            Source : www.getfreequotes.com
                                            <br>
                                            Quote : "If there's a will there's a way"
                                            Author : John Doe
                                            Source : www.getfreequotes.com
                                            <br>
                                            Quote : "If there's a will there's a way"
                                            Author : John Doe
                                            Source : www.getfreequotes.com
                                            <br>
                                            Quote : "If there's a will there's a way"
                                            Author : John Doe
                                            Source : www.getfreequotes.com
                                            <br>
                                            Quote : "If there's a will there's a way"
                                            Author : John Doe
                                            Source : www.getfreequotes.com
                                            <br>
                                            Quote : "If there's a will there's a way"
                                            Author : John Doe
                                            Source : www.getfreequotes.com
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<<<<<<< HEAD

    <!-- jQuery -->
    <script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../../assets/bower_components/raphael/raphael-min.js"></script>
    <script src="../../assets/bower_components/morrisjs/morris.min.js"></script>
    <script src="../../assets/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../assets/js/sb-admin-2.js"></script>
=======
>>>>>>> c5144c80a5d555a61c77fcfbbf6a06848cdce4bf
</body>
</html>