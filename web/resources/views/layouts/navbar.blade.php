<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
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
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul id="test" class="nav navbar-nav navbar-right">
                <li class=@yield('homeact')><a href="home">Home</a></li>
                <li class=@yield('aboutact')><a href="">About</a></li>
                <li class=@yield('termact')><a href="termofuse">API</a></li> 
                <li class=@yield('contacact')><a href="#">Contact</a></li>
                <li class=@yield('faqact')><a href="#">FAQ</a></li>
            </ul>
        </div>
    </div>
</nav>