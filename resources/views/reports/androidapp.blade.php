@extends('main')

@section('title', 'FLAS | Report Generation')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}
  {!!Html::style('css/parsley.css')!!}
@endsection


@section('content')

  <div class="row">
        <div class="col-lg-12 margin-tb">
            <ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#firestations">Fire Stations</a></li>
			  <li><a data-toggle="tab" href="#emrgencymessages">Emergency Messages <span class="badge">{{ $totalappmessages }}</span></a></li>
			</ul>

			<div class="tab-content">
			  <div id="firestations" class="tab-pane fade in active">
			    <h3>Fire Stations (ফায়ার স্টেশন) <span class="badge">{{ $totalfirestations }}</span></h3>
				<div class="row">
					<div class="col-lg-6">
						<table class="table table-bordered">
					      <tr>
					        <th>No</th><th>ফায়ার স্টেশনের নাম</th><th>অক্ষাংশ (Latitude)</th><th>Longitude</th>
					      </tr>
					      <?php $i = 1;?>
					      @foreach ($firestations as $firestation)
					      <tr>
					        <td>{{ $i++ }}</td>
					        <td>{{ $firestation->name }}</td>
					        <td>{{ $firestation->lat }}</td>  
					        <td>{{ $firestation->lon }}</td>  
					      </tr>
					      @endforeach
					    </table>

					    {!! $firestations->links() !!}
					</div>
					<div class="col-lg-6">
						<div class="well">
						<h4>নতুন ফায়ার স্টেশন যোগ করুনঃ</h4>
							{!! Form::open(['url' => 'reports/new/firestation','method'=>'POST', 'data-parsley-validate' => '']) !!}
							    <div class="form-group">
					                <strong>ফায়ার স্টেশনের নাম:</strong>
					                {!! Form::text('name', null, array('placeholder' => 'নাম লিখুন','class' => 'form-control', 'required' => '')) !!}
					            </div>
					            <div class="form-group">
					                <strong>মোবাইল ফোন নাম্বার:</strong>
					                {!! Form::text('phone', null, array('placeholder' => 'মোবাইল নাম্বার লিখুন','class' => 'form-control', 'required' => '')) !!}
					            </div>
					            <div class="row">
					            	<div class="col-lg-6">
					            		<div class="form-group">
							                <strong>ফায়ার স্টেশনের অক্ষাংশ (Latitude):</strong>
							                {!! Form::text('lat', null, array('placeholder' => 'যেমনঃ 23.123123','class' => 'form-control', 'required' => '')) !!}
							            </div> 
					            	</div>
					            	<div class="col-lg-6">
					            		<div class="form-group">
							                <strong>ফায়ার স্টেশনের দ্রাঘিমাংশ (Longitude):</strong>
							                {!! Form::text('lon', null, array('placeholder' => 'যেমনঃ 90.123123','class' => 'form-control', 'required' => '')) !!}
							            </div>
					            	</div>
					            </div>
					            <div class="row">
					            	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
									<button type="submit" class="btn btn-primary btn-block">নতুন ফায়ার স্টেশন যোগ করুন</button>
					        </div>
					            </div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			  </div>

			  <div id="emrgencymessages" class="tab-pane fade in">
			    <h3>Emergency Messages (ইমারজেন্সি মেসেজ) <span class="badge">{{ $totalappmessages }}</span>
				<a href="{{ url('/reports/export/androidapp/messages') }}" style="float: right;"><i class="fa fa-file-excel-o" aria-hidden="true" style="font-size: 20px; color: green;"></i> ডাউনলোড করুন <i class="fa fa-download" aria-hidden="true"></i></a>
			    </h3>
				<table class="table table-bordered">
					      <tr>
					        <th>No</th><th>ফোন নাম্বার</th><th>এসএমএস সেন্টার</th><th>অবস্থান (Location)</th><th>Nearest Fire Station (নিকটস্থ ফায়ার স্টেশন)</th><th>Received at (সময়)</th>
					      </tr>
					      <?php $j = 1;?>
					      @foreach ($appmessages as $appmessage)
					      <tr>
					        <td>{{ $j++ }}</td>
					        <td>{{ $appmessage->phone }}</td>
					        <td>{{ $appmessage->smscenter }}</td>  
					        <td>
								<?php
									$coordinates = explode(",", $appmessage->text_utf8, 2);
									$lat= $coordinates[0]; //latitude 
									$lng= $coordinates[1]; //longitude
								?>	
								{{ getaddress($lat,$lng) }}
					        </td>
					        <td>
					        	<?php 
					        		$distances = array();
					        	?>
								@foreach ($firestationsfordistance as $firestation)
								<?php
									$lat2= $firestation->lat; //latitude 
									$lng2= $firestation->lon; //longitude
									$distances[] = array(distance($lat, $lng, $lat2, $lng2, "M"), $firestation->name, $firestation->phone);
								?>

								@endforeach
								<?php 
									sort($distances);
									echo $distances[0][1];
									echo ', ';
									echo substr($distances[0][0], 0, 6).' km';	
								?>
					        </td>  
					        <td>{{ date('F d, Y | h:i A', strtotime($appmessage->created_at))}}, {{ $appmessage->created_at->diffForHumans() }}</td>    
					      </tr> 
					      @endforeach
					    </table>
			  </div>
			  
			  
			  
			  
			</div>
        </div>
  </div>
    
@endsection

@section('script')
  {!!Html::script('js/parsley.min.js')!!}
@endsection