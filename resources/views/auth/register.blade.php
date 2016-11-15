@extends('main')

@section('title', 'FLAS | Regiter')
@section('stylesheet')
	{!!Html::style('css/parsley.css')!!}
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Register</h1>
			<hr>
			{!! Form::open(['data-parsley-validate' => '']) !!}
				<div class="row">
					<div class="col-md-6">
			 		{!! Form::label('name', 'Name:') !!}
			 		{!! Form::text('name', null, array('class' => 'form-control', 'required' => '')) !!}
			 		{!! Form::hidden('role', 'blogger') !!}
					</div>

					<div class="col-md-6">
			 		{!! Form::label('email', 'Email:', array('class' => '')) !!}
			 		{!! Form::email('email', null, array('class' => 'form-control', 'required' => '')) !!}
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
					{!! Form::label('password', 'Password:', array('class' => 'form-spacing-top')) !!}
			 		{!! Form::password('password', array('class' => 'form-control' , 'required' => '', 'data-parsley-minlength' => '8', 'data-parsley-pattern' => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/', 'data-parsley-pattern-message' => 'Minimum 8 characters, should contain atleast 1 uppercase, 1 lowercase and 1 number')) !!}	
					</div>

					<div class="col-md-6">
					{!! Form::label('password_confirmation', 'Confirm Password:', array('class' => 'form-spacing-top')) !!}
			 		{!! Form::password('password_confirmation', array('class' => 'form-control' , 'required' => '', 'data-parsley-equalto' => '#password')) !!}
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
					{!! Form::submit('Register', array('class' => 'btn btn-primary btn-block', 'style' => 'margin-top:20px;')) !!}	
					</div>
				</div>				 	
			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('script')
	{!!Html::script('js/parsley.min.js')!!}
@endsection
