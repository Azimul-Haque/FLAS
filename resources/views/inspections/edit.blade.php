@extends('main')

@section('title', 'FLAS | Welcome')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}

@endsection

@section('content')
	<div class="row">
		{!! Form::model($inspection, ['method' => 'PATCH','route' => ['inspections.update', $inspection->id]]) !!}
	<div class="col-md-8">
			<h1 class="">আবেদন পত্র নিরীক্ষণ-Phase 1</h1>
			<table class="table">
				<thead>
					<tr>
						<th width="20%">Label</th>
						<th>Input</th>
						<th>Check</th>
						<th width="20%">Initial</th>
					</tr>
				</thead>
				<tbody>
				
					<tr>
						{!! Form::hidden('application_id', $application->id) !!}
						{!! Form::hidden('email', $application->email) !!}
						<th>প্রতিষ্ঠানের নাম</th>
						<td>{{ $application->company_name}}</td>
						<td>{!! Form::checkbox('check_company_name', 'on', false) !!}</td>
						<td>
						{!! Form::text('initial_company_name', null, array('class' => 'form-control')) !!}
						</td> 
					</tr>
					<tr>
						<th>ইমেইল</th>
						<td>{!! $application->email!!}</td>
						<td>{!! Form::checkbox('check_email', 'on', false) !!}</td>
						<td>{!! Form::text('initial_email', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>ফোন নাম্বার</th>
						<td>{!! $application->phone!!}</td>
						<td>{!! Form::checkbox('check_phone', 'on', false) !!}</td>
						<td>{!! Form::text('initial_phone', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>স্বত্বাধিকারী</th>
						<td>{!! $application->owner!!}</td>
						<td>{!! Form::checkbox('check_owner', 'on', false) !!}</td>
						<td>{!! Form::text('initial_owner', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>চেয়ারম্যান</th>
						<td>{!! $application->chairman!!}</td>
						<td>{!! Form::checkbox('check_chairman', 'on', false) !!}</td>
						<td>{!! Form::text('initial_chairman', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>প্রধান নির্বাহী কর্মকর্তা</th>
						<td>{!! $application->ceo!!}</td>
						<td>{!! Form::checkbox('check_ceo', 'on', false) !!}</td>
						<td>{!! Form::text('initial_ceo', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>ঠিকানা</th>
						<td>{!! $application->address!!}</td>
						<td>{!! Form::checkbox('check_address', 'on', false) !!}</td>
						<td>{!! Form::text('initial_address', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>শ্রমিক সংখ্যা</th>
						<td>{!! $application->employees!!}</td>
						<td>{!! Form::checkbox('check_employees', 'on', false) !!}</td>
						<td>{!! Form::text('initial_employees', null, array('class' => 'form-control')) !!}</td>

					</tr>
					<tr>
						<th>প্রতিষ্ঠার সাল</th>
						<td>{!! $application->estd!!}</td>
						<td>{!! Form::checkbox('check_estd', 'on', false) !!}</td>
						<td>{!! Form::text('initial_estd', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>আয়তন</th>
						<td>{!! $application->area!!}</td>
						<td>{!! Form::checkbox('check_area', 'on', false) !!}</td>
						<td>{!! Form::text('initial_area', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>অগ্নি নির্বাপকের সংখ্যা</th>
						<td>{!! $application->fire_extinguisher!!}</td>
						<td>{!! Form::checkbox('check_fire_extinguisher', 'on', false) !!}</td>
						<td>{!! Form::text('initial_fire_extinguisher', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>অগ্নি নির্বাপকের মেয়াদ</th>
						<td>{{ date('F d, Y', strtotime($application->fire_extinguisher_exp_date))}}</td>
						<td>{!! Form::checkbox('check_fire_extinguisher_exp_date', 'on', false) !!}</td>
						<td>{!! Form::text('initial_fire_extinguisher_exp_date', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>রড ব্রেকার সংখ্যা</th>
						<td>{!! $application->rod_breaker!!}</td>
						<td>{!! Form::checkbox('check_rod_breaker', 'on', false) !!}</td>
						<td>{!! Form::text('initial_rod_breaker', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>জরুরী বহির্গমন পথের সংখ্যা</th>
						<td>{!! $application->emergency_exit!!}</td>
						<td>{!! Form::checkbox('check_emergency_exit', 'on', false) !!}</td>
						<td>{!! Form::text('initial_emergency_exit', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>মোট তলা</th>
						<td>{!! $application->storey!!}</td>
						<td>{!! Form::checkbox('check_storey', 'on', false) !!}</td>
						<td>{!! Form::text('initial_storey', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>নিকটতম ভবন সংখ্যা</th>
						<td>{!! $application->nearest_buildings!!}</td>
						<td>{!! Form::checkbox('check_nearest_buildings', 'on', false) !!}</td>
						<td>{!! Form::text('initial_nearest_buildings', null, array('class' => 'form-control')) !!}</td>
					</tr>
					<tr>
						<th>কোম্পানির লে-আউট প্ল্যান</th>
						<td>
							<?php
								$fileExt = substr($application->layoutplan,-3);
							?>
							@if($fileExt != 'pdf')
							<a href="{{ url('files/'.$application->email.'/'.$application->layoutplan) }}" target="_blank">
								<img src="{{ asset('files/'.$application->email.'/'.$application->layoutplan) }}" class="img-responsive" style="max-width: 100px;">
							</a>
							@else
							<a href="{{ url('files/'.$application->email.'/'.$application->layoutplan) }}" target="_blank">লে-আউট প্ল্যান</a>
							@endif
						</td>
						<td>{!! Form::checkbox('check_layoutplan', 'on', false) !!}</td>
						<td>{!! Form::text('initial_layoutplan', null, array('class' => 'form-control')) !!}</td> 
					</tr>
					<tr>
						<th>স্বত্বাধিকারী সংক্রান্ত ডকুমেন্ট</th>
						<td>
							<?php
								$fileExt = substr($application->ownershipdocument,-3);
							?>
							@if($fileExt != 'pdf')
							<a href="{{ url('files/'.$application->email.'/'.$application->ownershipdocument) }}" target="_blank">
								<img src="{{ asset('files/'.$application->email.'/'.$application->ownershipdocument) }}" class="img-responsive" style="max-width: 100px;">
							</a>
							@else
							<a href="{{ url('files/'.$application->email.'/'.$application->ownershipdocument) }}" target="_blank">স্বত্বাধিকারী সংক্রান্ত ডকুমেন্ট</a>
							@endif
						</td>
						<td>{!! Form::checkbox('check_ownershipdocument', 'on', false) !!}</td>
						<td>{!! Form::text('initial_ownershipdocument', null, array('class' => 'form-control')) !!}</td> 
					</tr>
					<tr>
						<th>ট্রেড লাইসেন্স</th>
						<td>
							<?php
								$fileExt = substr($application->tradelicense,-3);
							?>
							@if($fileExt != 'pdf')
							<a href="{{ url('files/'.$application->email.'/'.$application->tradelicense) }}" target="_blank">
								<img src="{{ asset('files/'.$application->email.'/'.$application->tradelicense) }}" class="img-responsive" style="max-width: 100px;">
							</a>
							@else
							<a href="{{ url('files/'.$application->email.'/'.$application->tradelicense) }}" target="_blank">ট্রেড লাইসেন্স</a>
							@endif 
						</td>
						<td>{!! Form::checkbox('check_tradelicense', 'on', false) !!}</td>
						<td>{!! Form::text('initial_tradelicense', null, array('class' => 'form-control')) !!}</td> 
					</tr>
					<tr>
						<th>আয়কর সার্টিফিকেট</th>
						<td>
							<?php
								$fileExt = substr($application->tinpaper,-3);
							?>
							@if($fileExt != 'pdf')
							<a href="{{ url('files/'.$application->email.'/'.$application->tinpaper) }}" target="_blank">
								<img src="{{ asset('files/'.$application->email.'/'.$application->tinpaper) }}" class="img-responsive" style="max-width: 100px;">
							</a>
							@else
							<a href="{{ url('files/'.$application->email.'/'.$application->tinpaper) }}" target="_blank">আয়কর সার্টিফিকেট</a>
							@endif 
						</td>
						<td>{!! Form::checkbox('check_tinpaper', 'on', false) !!}</td>
						<td>{!! Form::text('initial_tinpaper', null, array('class' => 'form-control')) !!}</td> 
					</tr>
					<tr>
						<th>ব্যাংক সার্টিফিকেট</th>
						<td>
							<?php
								$fileExt = substr($application->bankcertificate,-3);
							?>
							@if($fileExt != 'pdf')
							<a href="{{ url('files/'.$application->email.'/'.$application->bankcertificate) }}" target="_blank">
								<img src="{{ asset('files/'.$application->email.'/'.$application->bankcertificate) }}" class="img-responsive" style="max-width: 100px;">
							</a>
							@else
							<a href="{{ url('files/'.$application->email.'/'.$application->bankcertificate) }}" target="_blank">ব্যাংক সার্টিফিকেট</a>
							@endif 
						</td>
						<td>{!! Form::checkbox('check_bankcertificate', 'on', false) !!}</td>
						<td>{!! Form::text('initial_bankcertificate', null, array('class' => 'form-control')) !!}</td> 
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
	</div>
@endsection


@section('script')
	{!!Html::script('')!!}
@endsection