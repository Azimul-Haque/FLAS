@extends('main')

@section('title', 'FLAS | Welcome')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}

@endsection


@section('content')

      <div class="row">
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size: 20px;">This is Home Page</span></div>
            <div class="panel-body">
              Content
              <ul>
                @role('Admin')
                <li><a href="{{ url('/admin') }}">Manage Users</a></li>
                <li><a href="{{ url('/roles') }}">Manage Roles</a></li>
                @endrole
                <li><a href="pages/posts">Manage Posts</a></li>
              </ul>
            </div>
          </div>
        </div>
       
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size: 20px;">Section 2</span></div>
            <div class="panel-body">
              Content
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
      </div>
@endsection

@section('script')
  {!!Html::script('')!!}
@endsection