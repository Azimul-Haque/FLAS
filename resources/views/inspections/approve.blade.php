@extends('main')

@section('title', 'FLAS | View Application')
@section('stylesheet')
	{!!Html::style('css/styles.css')!!}
	{!!Html::style('css/font-awesome.min.css')!!}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css">
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1 class="">Application View</h1>
			<table class="table">
				<thead>
					<tr>
						<th>Company Name</th>
						<td>{{ $application->company_name}}</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>{!! $application->email!!}</td>
					</tr>
					<tr>
						<th>Phone</th>
						<td>{!! $application->phone!!}</td>
					</tr>
					<tr>
						<th>Owner</th>
						<td>{!! $application->owner!!}</td>
					</tr>
					<tr>
						<th>Chairman</th>
						<td>{!! $application->chairman!!}</td>
					</tr>
					<tr>
						<th>CEO</th>
						<td>{!! $application->ceo!!}</td>
					</tr>
					<tr>
						<th>Address</th>
						<td>{!! $application->address!!}</td>
					</tr>
					<tr>
						<th>Employees</th>
						<td>{!! $application->employees!!}</td>

					</tr>
					<tr>
						<th>Established</th>
						<td>{!! $application->estd!!}</td>
					</tr>
					<tr>
						<th>Image</th>
						<td><img src="{{ asset('images/'. $application->image) }}" class="img-responsive"></td>
					</tr>
				</thead>
			</table>			
		</div>
		<div class="col-md-4">
			<div class="well">
				<span style="font-size: 25px; ">
				<strong>Applicantion Approval</strong></span>
				{!! Form::open(['route' => ['inspections.approvepost', $application->id], 'data-parsley-validate' => '', 'method' => 'POST']) !!}

					{!! Form::hidden('application_id', $application->id) !!}
					{!! Form::hidden('email', $application->email) !!}

			 		{!! Form::label('approval_message', 'Approval Message', ['style' => 'margin-top: 10px;']) !!}
			 		{!! Form::textarea('approval_message', 'Your application has been accepted by the authority of BFSCD. Your license number is the following number.', array('class' => 'form-control', 'required' => '', 'rows' => '4')) !!}

			 		{!! Form::label('license_number', 'License Number', ['class' => 'form-spacing-top']) !!}
			 		{!! Form::text('license_number', null, array('class' => 'form-control', 'required' => '')) !!}

			 		<div class="form-group form-spacing-top">
                        {!!Form::label('expiry_date', 'License Expires') !!}    
                        <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            {!!Form::text('expiry_date', null, ['class'=>'form-control']) !!}
                            
                        </div>    
                    </div> 

				
				<div class="row form-spacing-top">
					<div class="col-sm-12">
            			{{Form::button('<i class="fa fa-envelope" aria-hidden="true"></i> Arrove &amp; Notify Applicant', array('type' => 'submit', 'class' => 'btn btn-success btn-block'))}}
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>

	</div>



@endsection

@section('script')
	{!!Html::script('')!!}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function() {
            $( ".input-group.date" ).datepicker({
                format: 'MM dd, yyyy',
                daysOfWeekHighlighted: "5,6",
                todayHighlight: true,
                autoclose: true,
            });
        });
    </script>
@endsection
