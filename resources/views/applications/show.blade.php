@extends('main')

@section('title', 'FLAS | View Application')
@section('stylesheet')
	{!!Html::style('css/styles.css')!!}
	{!!Html::style('css/font-awesome.min.css')!!}
@endsection

@section('content')

	<div class="row">
		@if($application->application_status_id === 4)
		<div class="col-md-8 col-md-offset-2">
			<div class="well">
				Your application has been rejected by the authority of BFSCD. </br>
				<dl class="dl-horizontal">
					<label>Company Name:</label>
					<span><strong>{{ $application->company_name }}</strong></span>
				</dl>
				<dl class="dl-horizontal">
					<label>Application Status:</label>
					<span>License is <strong>{{ $application->application_status->display_name }}</strong></span>
				</dl>
			</div>
		</div>
		@else
		<div class="col-md-8">
			<span>Your tracking number is: <big><b>{{$application->tracking_number }}</b></big>. Use it track the application status.</span>
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
				<dl class="dl-horizontal">
					<label>Application Status</label>
					<p>License is <strong>{{ $application->application_status->display_name }}</strong></p>
				</dl>
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
						@if ($application->is_editable === 1)
						{!! Html::linkRoute('applications.edit', 'Edit', array($application->id), array('class'=>'btn btn-primary btn-block')) !!}
						@else
						<button class="btn btn-primary btn-block disabled">Edit</button>
						@endif
						
						
					</div>
					<div class="col-sm-6">
					{!! Html::linkRoute('applications.destroy', 'Revoke', array($application->id), array('class'=>'btn btn-danger btn-block')) !!}
					</div>
				</div>
			</div>
		</div>
		@endif

	</div>



@endsection

@section('script')
	{!!Html::script('')!!}
@endsection
