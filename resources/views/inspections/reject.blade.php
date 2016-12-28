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
			<h1 class="">আবেদন পত্র প্রত্যাখ্যান-Rejection</h1>
			<table class="table">
				<thead>
					<tr>
						<th width="30%">প্রতিষ্ঠানের নাম</th>
						<td>{{ $application->company_name}}</td>
					</tr>
					<tr>
						<th width="30%">কোম্পানির ধরণ</th>
						<td>{{ $application->company_type }}</td>
					</tr>
					<tr>
						<th>ইমেইল</th>
						<td>{!! $application->email!!}</td>
					</tr>
					<tr>
						<th>ফোন</th>
						<td>{!! $application->phone!!}</td>
					</tr>
					<tr>
						<th>স্বত্বাধিকারী</th>
						<td>{!! $application->owner!!}</td>
					</tr>
					<tr>
						<th>চেয়ারম্যান</th>
						<td>{!! $application->chairman!!}</td>
					</tr>
					<tr>
						<th>প্রধান নির্বাহী কর্মকর্তা</th>
						<td>{!! $application->ceo!!}</td>
					</tr>
					<tr>
						<th>ঠিকানা</th>
						<td>{!! $application->address!!}</td>
					</tr>
					<tr>
						<th>শ্রমিক সংখ্যা</th>
						<td>{!! $application->employees!!}</td>

					</tr>
					<tr>
						<th>প্রতিষ্ঠার সাল</th>
						<td>{!! $application->estd!!}</td>
					</tr>
					<tr>
						<th>আয়তন</th>
						<td>{!! $application->area!!}</td>
					</tr>
					<tr>
						<th>অগ্নি নির্বাপকের সংখ্যা</th>
						<td>{!! $application->fire_extinguisher!!}</td>
					</tr>
					<tr>
						<th>অগ্নি নির্বাপকের মেয়াদ</th>
						<td>{{ date('F d, Y', strtotime($application->fire_extinguisher_exp_date))}}</td>
					</tr>
					<tr>
						<th>রড ব্রেকার সংখ্যা</th>
						<td>{!! $application->rod_breaker!!}</td>
					</tr>
					<tr>
						<th>জরুরী বহির্গমন পথের সংখ্যা</th>
						<td>{!! $application->emergency_exit!!}</td>
					</tr>
					<tr>
						<th>মোট তলা</th>
						<td>{!! $application->storey!!}</td>
					</tr>
					<tr>
						<th>নিকটতম ভবন সংখ্যা</th>
						<td>{!! $application->nearest_buildings!!}</td>
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
					</tr>
				</thead>
			</table>			
		</div>
		<div class="col-md-4">
			<div class="well">
				<span style="font-size: 25px; ">
				<strong>Applicantion Rejection</strong></span>
				{!! Form::open(['route' => ['inspections.rejectpost', $application->id], 'data-parsley-validate' => '', 'method' => 'POST']) !!}

					{!! Form::hidden('application_id', $application->id) !!}
					{!! Form::hidden('email', $application->email) !!}

			 		{!! Form::label('rejection_message', 'Rejection Message', ['style' => 'margin-top: 10px;']) !!}
			 		{!! Form::textarea('rejection_message', 'Your application has been rejected by the authority of BFSCD. Your license application is no longer valid.', array('class' => 'form-control', 'required' => '', 'rows' => '4')) !!}

				
				<div class="row form-spacing-top">
					<div class="col-sm-12">
            			{{Form::button('<i class="fa fa-envelope" aria-hidden="true"></i> Reject &amp; Notify Applicant', array('type' => 'submit', 'class' => 'btn btn-success btn-block'))}}
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>

	</div>



@endsection

@section('script')
	{!!Html::script('')!!}
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
	    <script>
	        $(function() {
	            $( ".input-group.date" ).datepicker({
	                format: 'MM dd, yyyy',
	                daysOfWeekHighlighted: "5,6",
	                todayHighlight: true,
	                autoclose: true,
	            });
	        });
	    </script> -->
@endsection
