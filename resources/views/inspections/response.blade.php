@extends('main')

@section('title', 'FLAS | Inspection')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}

@endsection


@section('content')

  <div class="row">
	@if($application->application_status_id > 1)
		<div class="col-md-8 col-md-offset-2">
		<div class="well">
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
	@endif
  </div> 
@endsection

@section('script')
  {!!Html::script('')!!}
@endsection