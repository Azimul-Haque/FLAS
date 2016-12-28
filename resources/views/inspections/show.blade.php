@extends('main')

@section('title', 'FLAS | View Application')
@section('stylesheet')
	{!!Html::style('css/styles.css')!!}
	{!!Html::style('css/font-awesome.min.css')!!}
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
				</thead>
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
						<a class="btn btn-primary btn-block" href="{{ route('inspections.inspect',$application->id) }}"> Inspect</a>

						
						
					</div>
					<div class="col-sm-6">
					{!! Form::open(['route' => ['inspections.destroy', $application->id], 'method'=>'DELETE']) !!}
						{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}
					{!! Form::close() !!}	
					</div>
				</div>
			</div>
		</div>

	</div>



@endsection

@section('script')
	{!!Html::script('')!!}
@endsection
