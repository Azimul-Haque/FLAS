@extends('main')

@section('title', 'FLAS | View Application')
@section('stylesheet')
	{!!Html::style('css/styles.css')!!}
	{!!Html::style('css/font-awesome.min.css')!!}
	{!!Html::style('css/dtpui.css')!!}
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css"> -->
@endsection

@section('content')

	<div class="row">
		<div class="col-md-7">
			<h1 class="">Application Inspection-Phase 2</h1>
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
		<div class="col-md-5">
			<div class="well">
				<span style="font-size: 25px; ">
				<strong>Phase 2 Verification</strong></span>
				{!! Form::open(['route' => ['inspections.postPhase2', $application->id], 'data-parsley-validate' => '', 'method' => 'POST']) !!}

					{!! Form::hidden('application_id', $application->id) !!}
					{!! Form::hidden('email', $application->email) !!}

			 		{!! Form::label('phase_2_message', 'Phase 2 Verification Message', ['style' => 'margin-top: 10px;']) !!}
			 		{!! Form::textarea('phase_2_message', null, array('class' => 'form-control', 'required' => '', 'rows' => '4')) !!} 
			 	<br/>					
				<div class="row">
					<div class="col-sm-12">
            			{{Form::button('<i class="fa fa-envelope" aria-hidden="true"></i> Notify Applicant', array('type' => 'submit', 'class' => 'btn btn-primary btn-block'))}}
					</div>
				</div>
				{!! Form::close() !!}
			</div>
			<div class="well">
				<div class="row" style="margin-top: 10px;">
					<div class="col-sm-12">
					<span style="font-size: 25px;">
					<strong>Proceed to 'Approve'</strong><br/></span>
					<br/>
					<a class="btn btn-success btn-block" href="{{ route('inspections.approve',$application->id) }}"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
					</div>
				</div>
			</div>
		</div>

	</div>



@endsection

@section('script')
	{!!Html::script('js/dtpui.js')!!}
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script> -->
    <script>
$(function() {
	$('#expiry_date').datepicker({
        dateFormat: 'yy-dd-mm',
        onSelect: function(datetext){
            var d = new Date(); // for now
            var h = d.getHours();
        		h = (h < 10) ? ("0" + h) : h ;

        		var m = d.getMinutes();
            m = (m < 10) ? ("0" + m) : m ;

            var s = d.getSeconds();
            s = (s < 10) ? ("0" + s) : s ;

        		datetext = datetext + " " + h + ":" + m + ":" + s;
            $('#expiry_date').val(datetext);
        },
    });
}); 
        /*$(function() {
            $( ".input-group.date" ).datepicker({
                format: 'MM dd, yyyy H S I A',
                daysOfWeekHighlighted: "5,6",
                todayHighlight: true,
                autoclose: true,
            });
        });*/
    </script>
@endsection
