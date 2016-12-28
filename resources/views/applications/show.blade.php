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
			<span>আপনার ট্র্যাকিং নাম্বার: <big><b>{{$application->tracking_number }}</b></big>. আবেদনের হাল জানার জন্য ট্র্যাকিং নাম্বার ব্যবহার করুন।</span>
			<h1 class="">ফায়ার লাইসেন্সের জন্য আবেদন পত্র</h1>
			<table class="table">
				<thead>
					<tr>
						<th width="30%">প্রতিষ্ঠানের নাম</th>
						<td>{{ $application->company_name}}</td>
					</tr>
					<tr>
						<th width="30%">আবেদনকারীর নাম</th>
						<td>{{ Auth::user()->name }}</td>
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
						<button class="btn btn-primary btn-block disabled"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
						@endif
						
						
					</div>
					<div class="col-sm-6">
					
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
