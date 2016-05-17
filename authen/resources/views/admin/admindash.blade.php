@extends('layouts.adminpage')
@section('bodycontent')

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
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
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
@endsection