@extends('main')

@section('title', 'FLAS | Welcome')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}

@endsection

@section('content')
	<div class="row">
		{!! Form::model($inspection, ['method' => 'PATCH','route' => ['inspections.update', $inspection->id]]) !!}
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
						<td>{!! Form::checkbox('check_company_name', $inspection->check_company_name, !empty($inspection->check_company_name) ? true : false) !!}</td>
						<td>
						{!! Form::text('initial_company_name', null, array('class' => 'form-control')) !!}
						</td> 
					</tr>
					<tr>
						<th>Email</th>
						<td>{!! $application->email!!}</td>
						<td>{!! Form::checkbox('check_email', $inspection->check_email, !empty($inspection->check_email) ? true : false) !!}</td>
						<td>{!! Form::text('initial_email', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Phone</th>
						<td>{!! $application->phone!!}</td>
						<td>{!! Form::checkbox('check_phone', $inspection->check_phone, !empty($inspection->check_phone) ? true : false) !!}</td>
						<td>{!! Form::text('initial_phone', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Owner</th>
						<td>{!! $application->owner!!}</td>
						<td>{!! Form::checkbox('check_owner', $inspection->check_owner, !empty($inspection->check_owner) ? true : false) !!}</td>
						<td>{!! Form::text('initial_owner', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Chairman</th>
						<td>{!! $application->chairman!!}</td>
						<td>{!! Form::checkbox('check_chairman', $inspection->check_chairman, !empty($inspection->check_chairman) ? true : false) !!}</td>
						<td>{!! Form::text('initial_chairman', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>CEO</th>
						<td>{!! $application->ceo!!}</td>
						<td>{!! Form::checkbox('check_ceo', $inspection->check_ceo, !empty($inspection->check_ceo) ? true : false) !!}</td>
						<td>{!! Form::text('initial_ceo', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Address</th>
						<td>{!! $application->address!!}</td>
						<td>{!! Form::checkbox('check_address', $inspection->check_address, !empty($inspection->check_address) ? true : false) !!}</td>
						<td>{!! Form::text('initial_address', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Employees</th>
						<td>{!! $application->employees!!}</td>
						<td>{!! Form::checkbox('check_employees', $inspection->check_employees, !empty($inspection->check_employees) ? true : false) !!}</td>
						<td>{!! Form::text('initial_employees', null, array('class' => 'form-control')) !!}</td>

					</tr>
					<tr>
						<th>Established</th>
						<td>{!! $application->estd!!}</td>
						<td>{!! Form::checkbox('check_estd', $inspection->check_estd, !empty($inspection->check_estd) ? true : false) !!}</td>
						<td>{!! Form::text('initial_estd', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>Image</th>
						<td><img src="{{ asset('images/'. $application->image) }}" class="img-responsive"></td>
						<td>{!! Form::checkbox('check_image', $inspection->check_image, !empty($inspection->check_image) ? true : false) !!}</td>
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
	</div>
@endsection


@section('script')
	{!!Html::script('')!!}
@endsection