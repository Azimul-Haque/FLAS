@extends('main')

@section('title', 'FLAS | View Application')
@section('stylesheet')
	{!!Html::style('css/styles.css')!!}
	{!!Html::style('css/font-awesome.min.css')!!}
@endsection

@section('content')

	<div class="row">
		{!! Form::open(['route' => 'inspections.notify', 'data-parsley-validate' => '', 'method' => 'POST']) !!}
		<div class="col-md-8">
			<h1 class="">Application View</h1>
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
						{!! Form::hidden('applications_id', $application->id) !!}
						<th>Company Name</th>
						<td>{{ $application->company_name}}</td>
						<td>{!! Form::checkbox('check_company_name', 'yes', false) !!}</td>
						<td>
						{!! Form::text('initial_company_name', null, array('class' => 'form-control')) !!}
						</td> 
					</tr>
					<tr>
						<th>Email</th>
						<td>{!! $application->email!!}</td>
						<td>{!! Form::checkbox('check_email', 'yes', false) !!}</td>
						<td>{!! Form::text('initial_email', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Phone</th>
						<td>{!! $application->phone!!}</td>
						<td>{!! Form::checkbox('check_phone', 'yes', false) !!}</td>
						<td>{!! Form::text('initial_ephone', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Owner</th>
						<td>{!! $application->owner!!}</td>
						<td>{!! Form::checkbox('check_owner', 'yes', false) !!}</td>
						<td>{!! Form::text('initial_owner', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Chairman</th>
						<td>{!! $application->chairman!!}</td>
						<td>{!! Form::checkbox('check_chairman', 'yes', false) !!}</td>
						<td>{!! Form::text('initial_chairman', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>CEO</th>
						<td>{!! $application->ceo!!}</td>
						<td>{!! Form::checkbox('check_ceo', 'yes', false) !!}</td>
						<td>{!! Form::text('initial_ceo', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Address</th>
						<td>{!! $application->address!!}</td>
						<td>{!! Form::checkbox('check_address', 'yes', false) !!}</td>
						<td>{!! Form::text('initial_address', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Employees</th>
						<td>{!! $application->employees!!}</td>
						<td>{!! Form::checkbox('check_employees', 'yes', false) !!}</td>
						<td>{!! Form::text('initial_employees', null, array('class' => 'form-control')) !!}</td>

					</tr>
					<tr>
						<th>Established</th>
						<td>{!! $application->estd!!}</td>
						<td>{!! Form::checkbox('check_estd', 'yes', false) !!}</td>
						<td>{!! Form::text('initial_estd', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Image</th>
						<td><img src="{{ asset('images/'. $application->image) }}" class="img-responsive"></td>
						<td>{!! Form::checkbox('check_image', 'yes', false) !!}</td>
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
					<div class="col-sm-6">
						{!! Form::submit('Notify Applicant', ['class'=>'btn btn-primary btn-block']) !!}
					</div>
					<div class="col-sm-6">

					<!--
					{!! Form::open(['route' => ['inspections.destroy', $application->id], 'method'=>'DELETE']) !!}
						{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}
					{!! Form::close() !!}	
					-->

					</div>
				</div>	
			</div>
		</div>
		{!! Form::close() !!}
	</div>



@endsection

@section('script')
	{!!Html::script('')!!}
@endsection
