<html>
<head>
  <meta charset="UTF-8" />
  <title>Document</title>
    {!!Html::style('css/styles.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
           <div id="hero-wrapper">
            <div class="carousel-wrapper">
              <div id="hero-carousel" class="carousel slide carousel-fade">
                <ol class="carousel-indicators">
                  <li data-target="#hero-carousel" data-slide-to="0" class="active"></li>
                  <li data-target="#hero-carousel" data-slide-to="1"></li>
                  <li data-target="#hero-carousel" data-slide-to="2"></li>
                  <li data-target="#hero-carousel" data-slide-to="3"></li>
                  <li data-target="#hero-carousel" data-slide-to="4"></li>
                  <li data-target="#hero-carousel" data-slide-to="5"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="{{url('/images/slides/1.jpg')}}">
                  </div>
                  <div class="item">
                    <img src="{{url('/images/slides/2.jpg')}}">
                  </div>
                  <div class="item">
                    <img src="{{url('/images/slides/3.jpg')}}">
                  </div>
                  <div class="item">
                    <img src="{{url('/images/slides/4.jpg')}}">
                  </div>
                  <div class="item">
                    <img src="{{url('/images/slides/5.jpg')}}">
                  </div>
                  <div class="item">
                    <img src="{{url('/images/slides/6.jpg')}}">
                  </div>
                  <div class="item">
                    <img src="{{url('/images/slides/7.jpg')}}">
                  </div>
                  <div class="item">
                    <img src="{{url('/images/slides/8.jpg')}}">
                  </div>
                </div>
                <a class="left carousel-control" href="#hero-carousel" data-slide="prev">
                  <i class="fa fa-chevron-left left"></i>
                </a>
                <a class="right carousel-control" href="#hero-carousel" data-slide="next">
                  <i class="fa fa-chevron-right right"></i>
                </a>
              </div>
            </div>
          </div> 
      </div>

      <div class="col-md-10 col-md-offset-1">
            <!-- Default Bootstrap Navbar -->
            <nav class="navbar navbar-default"> <!--USE IT NEAR FUTURE  navbar-fixed-top-->
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="/">FLAS</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling-->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    @if(Auth::check())
                    <li class=""><a href="{{ url('/home') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    @endif
                    @role('Admin')
                    <li class="dropdown">
                      <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs" aria-hidden="true"></i>  Admin <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ url('/admin') }}"><i class="fa fa-users" aria-hidden="true"></i> Manage Users</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/roles') }}"><i class="fa fa-wrench" aria-hidden="true"></i> Manage Roles</a></li>
                      </ul>
                    </li>
                    @endrole
                    @role('Inspector')
                    <li class="dropdown">
                      <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list-ol" aria-hidden="true"></i> Inspect Applications <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li class=""><a href="{{ route('inspections.pending') }}"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Pending Applications</a></li>
                        <li role="separator" class="divider"></li>
                        <li class=""><a href="{{ route('inspections.inspected') }}"><i class="fa fa-hourglass-half" aria-hidden="true"></i> Inspected Applications</a></li>
                        <li role="separator" class="divider"></li>
                        <li class=""><a href="{{ route('inspections.approved') }}"><i class="fa fa-check" aria-hidden="true"></i> Approved Applications</a></li>
                        <li role="separator" class="divider"></li>
                        <li class=""><a href="{{ route('inspections.rejected') }}"><i class="fa fa-ban" aria-hidden="true"></i> Rejected Applications</a></li>
                        <li role="separator" class="divider"></li>
                        <li class=""><a href="{{ route('inspections.expired') }}"><i class="fa fa-clock-o" aria-hidden="true"></i> Expired Applications</a></li>
                      </ul>
                    </li>
                    @endrole
                    @role('Applicant')
                    <li class=""><a href="{{route('applications.create')}}"><i class="fa fa-address-card" aria-hidden="true"></i> Application</a></li>
                    @endrole
                    <li><a href="{{ url('/about') }}"><i class="fa fa-address-book-o" aria-hidden="true"></i> About</a></li>
                    <li><a href="{{ url('/contact') }}"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">

                    @if(Auth::check())
                    <li class="dropdown">
                      <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> {{Auth::user()->name}} <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ route('logout') }}" class=""><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                      </ul>
                    </li>
                    @else
                    <li class="dropdown">
                      <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> User Account <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ route('login') }}" class=""><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                        <li><a href="{{ route('register') }}" class=""><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></li>
                      </ul>
                    </li>
                    @endif
                  </ul>
                </div>
                <!-- /.navbar-collapse -->
              </div>
              <!-- /.container-fluid -->
            </nav>
      </div>

    </div>
  </div>
   
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="js/parsley.min.js"></script>
  <script>
    $('#carouselHacked').carousel();
  </script>
</body>
</html>