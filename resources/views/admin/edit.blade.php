@extends('main')

@section('title', 'FLAS | Welcome')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}

@endsection

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit User</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('admin.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	{!! Form::model($user, ['method' => 'PATCH','route' => ['admin.update', $user->id]]) !!}
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Name:</strong>
	                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Email:</strong>
	                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Password:</strong>
	                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Confirm Password:</strong>
	                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Role:</strong>
	                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
	        </div>			
		</div>
	</div>
	{!! Form::close() !!}
@endsection


@section('script')
	{!!Html::script('')!!}
@endsection