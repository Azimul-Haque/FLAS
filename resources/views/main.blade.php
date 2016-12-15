<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
    <!-- CHANGE THIS TITLE FOR EACH PAGE -->
    @yield('stylesheet')
    {!!Html::style('css/styles.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
  </head>

  <body>

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
          <a class="navbar-brand" href="/">Fire License Automation System</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
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
            @role('Rapporteur')
            <li class=""><a href="{{ url('reports/') }}"><i class="fa fa-bar-chart" aria-hidden="true"></i> Generate Report</a></li>
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

    <div class="container-fluid"> <!--USE IT NEAR FUTURE  style="margin-top:50px"-->
      @if(Auth::check())
          <div class="row">
            <div class="col-md-2">
                <div class="panel-group" id="accordion">
                  @role('Admin')
                  <div class="panel panel-default">
                    <div class="panel-heading vertical-menu-panel vertical-menu-panel">
                      <h4 class="panel-title">
                        <a class="vertical-menu-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1"><i class="fa fa-cogs" aria-hidden="true"></i>  Admin <span class="caret"></span></a> 
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse
                    @role('Admin')
                    in
                    @endrole
                    ">
                      <ul class="list-group">
                        <li class="list-group-item">
                          <a href="{{ url('/admin') }}"><i class="fa fa-users" aria-hidden="true"></i> Manage Users</a>
                        </li>
                        <li class="list-group-item">
                          <a href="{{ url('/roles') }}"><i class="fa fa-wrench" aria-hidden="true"></i> Manage Roles</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  @endrole
                  @role('Inspector')
                  <div class="panel panel-default ">
                    <div class="panel-heading vertical-menu-panel">
                      <h4 class="panel-title">
                        <a class="vertical-menu-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class="fa fa-list-ol" aria-hidden="true"></i> Inspection <span class="caret"></span></a>
                      </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse
                    @role('Inspector')
                    in
                    @endrole
                    ">
                      <ul class="list-group">
                        <li class="list-group-item">
                          <a href="{{ route('inspections.pending') }}"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Pending Applications</a>
                        </li>
                        <li class="list-group-item">
                          <a href="{{ route('inspections.inspected') }}"><i class="fa fa-hourglass-half" aria-hidden="true"></i> Inspected Applications</a>
                        </li>
                        <li class="list-group-item">
                          <a href="{{ route('inspections.approved') }}"><i class="fa fa-check" aria-hidden="true"></i> Approved Applications</a>
                        </li>
                        <li class="list-group-item">
                          <a href="{{ route('inspections.rejected') }}"><i class="fa fa-ban" aria-hidden="true"></i> Rejected Applications</a>
                        </li>
                        <li class="list-group-item">
                          <a href="{{ route('inspections.expired') }}"><i class="fa fa-clock-o" aria-hidden="true"></i> Expired Applications</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  @endrole
                  @role('Applicant')
                  <div class="panel panel-default ">
                    <div class="panel-heading vertical-menu-panel">
                      <h4 class="panel-title">
                        <a class="vertical-menu-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse3"><i class="fa fa-address-card" aria-hidden="true"></i> Application <span class="caret"></span></a>
                      </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse
                    @role('Applicant')
                    in
                    @endrole
                    ">
                      <ul class="list-group">
                        <li class="list-group-item">
                          <a href="{{route('applications.create')}}"><i class="fa fa-file-word-o" aria-hidden="true"></i> Application</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  @endrole
                  @role('Rapporteur')
                  <div class="panel panel-default ">
                    <div class="panel-heading vertical-menu-panel">
                      <h4 class="panel-title">
                        <a class="vertical-menu-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse4"><i class="fa fa-file-text" aria-hidden="true"></i> Report <span class="caret"></span></a>
                      </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse
                    @role('Rapporteur')
                    in
                    @endrole
                    ">
                      <ul class="list-group">
                        <li class="list-group-item">
                          <a href="{{ url('reports/') }}"><i class="fa fa-bar-chart" aria-hidden="true"></i> Generate Report</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  @endrole
                </div>
            </div>
          <div class="col-md-10">
          @include('partials._messages')
            @yield('content')
          </div>
      @else
      @include('partials._messages')
      @yield('content')
      @endif

      </div>
      

    </div>
    <!-- end of .container -->

    <div class="footer">
      <div class="container">
        <hr>
        <p class="text-muted text-center">&copy; {{date('Y')}} Copyright Reserved, Fire License Automation System, BFSCD</p>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="js/parsley.min.js"></script>
    @yield('script')
  </body>

</html>