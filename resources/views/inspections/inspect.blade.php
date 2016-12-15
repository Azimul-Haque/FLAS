@extends('main')

@section('title', 'FLAS | View Application')
@section('stylesheet')
	{!!Html::style('css/styles.css')!!}
	{!!Html::style('css/font-awesome.min.css')!!}
@endsection

@section('content')

	<div class="row">
@if($application->application_status_id > 1)
	<div class="col-md-8 col-md-offset-2">
	<div class="well">
		<p style="font-size: 25px;">This application has been inspected once!</p>
		<dl class="dl-horizontal">
					<label>Companyh Name:</label>
					<p>{{ $application->company_name }}</p>
		</dl>
		<dl class="dl-horizontal">
					<label>Applied Date:</label>
					<p>{{ date('F d, Y h:i A', strtotime($application->created_at))}}</p>
		</dl>
		<a class="btn btn-primary btn-sm" href="{{ route('inspections.edit',$application->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Inspect Again</a>
	</div>
	</div>
@else
		{!! Form::open(['route' => 'inspections.notify', 'data-parsley-validate' => '', 'method' => 'POST']) !!}
		<div class="col-md-8">
			<h1 class="">Application Inspection-Phase 1</h1>
			<table class="table">
				<thead>
					<tr>
						<th>Label</th>
						<th>Input</th>
						<th>Check</th>
						<th>Initial</th>
					</tr>
				</thead>
				<tbody>
				
					<tr>
						{!! Form::hidden('application_id', $application->id) !!}
						{!! Form::hidden('email', $application->email) !!}
						<th>Company Name</th>
						<td>{{ $application->company_name}}</td>
						<td>{!! Form::checkbox('check_company_name', 'on', false) !!}</td>
						<td>
						{!! Form::text('initial_company_name', null, array('class' => 'form-control')) !!}
						</td> 
					</tr>
					<tr>
						<th>Email</th>
						<td>{!! $application->email!!}</td>
						<td>{!! Form::checkbox('check_email', 'on', false) !!}</td>
						<td>{!! Form::text('initial_email', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Phone</th>
						<td>{!! $application->phone!!}</td>
						<td>{!! Form::checkbox('check_phone', 'on', false) !!}</td>
						<td>{!! Form::text('initial_phone', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Owner</th>
						<td>{!! $application->owner!!}</td>
						<td>{!! Form::checkbox('check_owner', 'on', false) !!}</td>
						<td>{!! Form::text('initial_owner', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Chairman</th>
						<td>{!! $application->chairman!!}</td>
						<td>{!! Form::checkbox('check_chairman', 'on', false) !!}</td>
						<td>{!! Form::text('initial_chairman', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>CEO</th>
						<td>{!! $application->ceo!!}</td>
						<td>{!! Form::checkbox('check_ceo', 'on', false) !!}</td>
						<td>{!! Form::text('initial_ceo', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Address</th>
						<td>{!! $application->address!!}</td>
						<td>{!! Form::checkbox('check_address', 'on', false) !!}</td>
						<td>{!! Form::text('initial_address', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Employees</th>
						<td>{!! $application->employees!!}</td>
						<td>{!! Form::checkbox('check_employees', 'on', false) !!}</td>
						<td>{!! Form::text('initial_employees', null, array('class' => 'form-control')) !!}</td>

					</tr>
					<tr>
						<th>Established</th>
						<td>{!! $application->estd!!}</td>
						<td>{!! Form::checkbox('check_estd', 'on', false) !!}</td>
						<td>{!! Form::text('initial_estd', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr> 
						<th>Image</th>
						<td><img src="{{ asset('images/'. $application->image) }}" class="img-responsive"></td>
						<td>{!! Form::checkbox('check_image', 'on', false) !!}</td>
						<td>{!! Form::text('initial_image', null, array('class' => 'form-control')) !!}</td>
					</tr>
				
				</tbody>
			</table>			
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Created at</label>
					<p>{{ date('F d, Y h:i A', strtotime($application->created_at))}}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Last updated</label>
					<p>{{ date('F d, Y h:i A', strtotime($application->updated_at))}}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-12">
						{!! Form::label('phase_1_message', 'Inspection Phase1 Message') !!}
            			{!! Form::textarea('phase_1_message', null, array('class' => 'form-control', 'rows' => '4')) !!}
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-sm-12">
            			{{Form::button('<i class="fa fa-envelope" aria-hidden="true"></i> Notify Applicant', array('type' => 'submit', 'class' => 'btn btn-primary btn-block'))}}
					</div>
				</div>
				<div class="row" style="margin-top: 10px;">
					<div class="col-sm-12">
					<a class="btn btn-success btn-block" href="{{ route('inspections.getPhase2',$application->id) }}"><i class="fa fa-step-forward" aria-hidden="true"></i> Enter Phase 2</a>
					</div>
				</div>
				<div class="row" style="margin-top: 10px;">
					<div class="col-sm-12">
					<a class="btn btn-danger btn-block" href="{{ route('inspections.reject',$application->id) }}"><i class="fa fa-ban" aria-hidden="true"></i> Reject</a>
					</div>
				</div>	
			</div>
		</div>
		{!! Form::close() !!}
@endif		

	</div>



@endsection

@section('script')
	{!!Html::script('')!!}
@endsection
