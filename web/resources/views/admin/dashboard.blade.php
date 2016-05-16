    <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Admin Inspire Crawler</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="../resources/assets/css/    .css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../assets/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css" rel="stylesheet">

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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        var isRunning = false;
        var interval = null;
        var dots = 0;
        var intervalLog = null;

        function dotAddition() {
            console.log(dots);
            if(dots < 10) {
                $('#dots').append('.');
                console.log("masok");
                dots++;
            } else {
                $('#dots').html('');
                dots = 0;
            }
        }

        function getLog() { 
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                var type = "POST";
                var formData = {
                    request: "log"
                };

                var my_url = 'http://localhost/timAul/web/public/admin/getLog';

                $.ajax({
                    type: type,
                    url: my_url,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        console.log("BERHASILLL");
                        
                        console.log(data);
                        $('.log').append(data["isi"]);

                        var logScroll    = $('#log');
                        var height = logScroll[0].scrollHeight;
                        logScroll.scrollTop(height);
                    },
                    error: function(data) {
                        console.log('Error!!!')
                    }
                });
        }

        function autoLoad() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                var type = "POST";
                var formData = {
                    request: "status"
                };

                var my_url = 'http://localhost/timAul/web/public/admin/getCrawlerStatus';

                $.ajax({
                    type: type,
                    url: my_url,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        console.log("BERHASILLL");
                        
                        console.log(data);
                        console.log(data);
                        console.log(data["status"]);
                        if(data["status"] == "OK"){
                            if(!isRunning) {
                                interval = setInterval(dotAddition,1000);
                                console.log("masuk");
                                $('#statusLog').html('Crawler is Running');
                                isRunning = true;
                            }
                        } else {
                            if (interval != null) {
                                clearInterval(interval);
                                $('#statusLog').html('Crawler is Stopped!');
                                $('#dots').html('');
                            }
                        }
                    },
                    error: function(data) {
                        console.log('Error!!!')
                    }
                });
        }

        setInterval(function(){
            autoLoad() // this will run after every 5 seconds
        }, 5000);   

        $('#playCrawler').click(function(e){
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            var type = "POST";
            var formData = {
                play: "Yeah"
            };

            var my_url = 'http://localhost/timAul/web/public/admin/playCrawler';

            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    console.log("BERHASILLL");
                    console.log(isRunning);
                    intervalLog = setInterval(getLog, 6000);
                },
                error: function(data) {
                    console.log('Error!!!')
                }
            });
        });

        $('#stopCrawler').click(function(e){
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            var type = "POST";
            var formData = {
                stop: "Yeah"
            };

            var my_url = 'http://localhost/timAul/web/public/admin/stopCrawler';

            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    console.log("BERHASILLL");
                     isRunning = false;
                     $('#statusLog').html('Crawler will be stopped');
                     console.log(isRunning);
                     clearInterval(intervalLog);
                },
                error: function(data) {
                    console.log('Error!!!')
                }
            });
        });

    });
    </script>
    

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
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i>CRUD Quote</a>
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
                            <div id="morris-area-chart"></div>
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
                                    <button id = "playCrawler"><i class="fa fa-play-circle fa-fw fa-4x"></i></button>
                                    <button id = "stopCrawler"><i class="fa fa-stop-circle fa-fw fa-4x"></i></button>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div id="statusCrawl" class="panel-body crawler">
                                            <span id="statusLog">Crawler is Stopped!</span><span id="dots"></span>
                                        </div>
                                    </div>
                                    <br>

                                    <span class="center">Crawler's Log</span>
                                    <div class="panel panel-default">
                                        <div id="log" class="panel-body log">

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


</body>
</html>