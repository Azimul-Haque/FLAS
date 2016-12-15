@extends('main')

@section('title', 'FLAS | Create New Post')
@section('stylesheet')
	{!!Html::style('css/styles.css')!!}
	{!!Html::style('css/parsley.css')!!}
	{!!Html::style('css/select2.min.css')!!}
	{!!Html::style('css/dtpui.css')!!}
	<!--<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	 <script>
	 	tinymce.init({
			  selector: 'textarea',
			  plugins: [
			    'advlist autolink lists link image charmap print preview anchor',
			    'searchreplace visualblocks code fullscreen',
			    'insertdatetime media table contextmenu paste code'
			  ],
			  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image table code preview',
			  menubar: 'file edit insert view ',
			  content_css: '//www.tinymce.com/css/codepen.min.css',
			  image_class_list: [
			    {title: 'Responsive', value: 'img-responsive'}
			  ],
     		   image_dimensions: false,
		});
	 </script>-->
@endsection

@section('content')

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@if(!empty($applied))
			<h3>You have already applied! ({{ $applied->application_status->display_name }})</h3>
			<a href="{{ url('applications/'.$applied->id) }}" class="btn btn-success">See Application</a>

			@else
			<h1>Apply for License (আবেদন করুন)</h1>
			<hr>
			{!! Form::open(['route' => 'applications.store', 'data-parsley-validate' => '', 'files' => 'true', 'enctype' => 'multipart/form-data', 'method' => 'POST']) !!}

			<div class="panel panel-default">
			  <div class="panel-heading">General Information (সাধারণ তথ্য)</div>
			  <div class="panel-body">
				  <div class="row">
					<div class="col-md-6">
				 		{!! Form::label('company_name', 'Name of the Company:') !!}
				 		{!! Form::text('company_name', null, array('class' => 'form-control', 'required' => '')) !!}
				 	</div>
				 	<div class="col-md-6">
				 		{!! Form::label('email', 'Email:', array('class' => '')) !!}
				 		{!! Form::email('email', null, array('class' => 'form-control', 'required' => '')) !!}	
				 	</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
					 		{!! Form::label('phone', 'Phone:', array('class' => '')) !!}
					 		{!! Form::text('phone', null, array('class' => 'form-control', 'required' => '')) !!}
					 	</div>
					 	<div class="col-md-6">
					 		{!! Form::label('owner', 'Name of the Owner:', array('class' => '')) !!}
					 		{!! Form::text('owner', null, array('class' => 'form-control', 'required' => '')) !!}
					 	</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
					 		{!! Form::label('chairman', 'Name of the Chairman:', array('class' => '')) !!}
					 		{!! Form::text('chairman', null, array('class' => 'form-control', 'required' => '')) !!}
					 	</div>
					 	<div class="col-md-6">
					 		{!! Form::label('ceo', 'Name of the CEO:', array('class' => '')) !!}
					 		{!! Form::text('ceo', null, array('class' => 'form-control', 'required' => '')) !!}
					 	</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
					 		{!! Form::label('address', 'Company Address:', array('class' => '')) !!}
					 		{!! Form::text('address', null, array('class' => 'form-control', 'required' => '')) !!}
					 	</div>
					 	<div class="col-md-6">
					 		{!! Form::label('estd', 'Established:') !!}
					 		{!! Form::text('estd', null, array('class' => 'form-control', 'required' => '')) !!}
					 	</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
					 		{!! Form::label('company_type', 'Company Type:', array('class' => '')) !!}
					 		{{ Form::select('company_type', [
							   '' => 'Select Company Type',
							   '0001' => 'Garments',
							   '0002' => 'Chemicals',
							   '0003' => 'Pharmaceuticals',
							   '0004' => 'Automobile Services',
							   '0005' => 'Logistics',
							   '0006' => 'Telecoms',
							   '0008' => 'Food & Beverage',
							   '0009' => 'Cement',
							   '0010' => 'Ceramics',
							   '0011' => 'Cosmetics & Toiletries',
							   '0012' => 'Electrical Cable',
							   '0013' => 'Textile',
							   '0014' => 'Batteries',
							   '0015' => 'Real Estate',
							   '0016' => 'Engineering',
							   '0017' => 'Newspaper',
							   '0018' => 'Petrochemical',
							   '0019' => 'Packaging',
							   '0020' => 'Furniture',
							   '0021' => 'Renewable Energy', 
							   '0022' => 'Steel',
							   '0023' => 'Hospital',
							   '0024' => 'Others'], null, array('class' => 'form-control', 'required' => '') 
							) }}
					 	</div>
					</div>	
			  </div>
			</div>

			<div class="panel panel-default">
			  <div class="panel-heading">Building Information (দালানের তথ্য)</div>
			  <div class="panel-body">
			  	<div class="row">
				 	<div class="col-md-6">
				 		{!! Form::label('employees', 'Total Employees:', array('class' => '')) !!}
				 		{!! Form::text('employees', null, array('class' => 'form-control', 'required' => '')) !!}
				 	</div>
				 	<div class="col-md-6">
				 		{!! Form::label('area', 'Total Area (Sq. Foot):', array('class' => '')) !!}
				 		{!! Form::text('area', null, array('class' => 'form-control', 'required' => '')) !!}
				 	</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-6">
				 		{!! Form::label('fire_extinguisher', 'Total Fire Extinguisher:', array('class' => '')) !!}
				 		{!! Form::text('fire_extinguisher', null, array('class' => 'form-control', 'required' => '')) !!}
				 	</div>
				 	<div class="col-md-6">
				 		{!! Form::label('fire_extinguisher_exp_date', 'Expiray Date (Fire Extinguisher):', array('class' => '')) !!}
				 		{!! Form::text('fire_extinguisher_exp_date', null, array('class' => 'form-control', 'required' => '')) !!}
				 	</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-6">
				 		{!! Form::label('rod_breaker', 'Total Rod Breaker:', array('class' => '')) !!}
				 		{!! Form::text('rod_breaker', null, array('class' => 'form-control', 'required' => '')) !!}
				 	</div>
				 	<div class="col-md-6">
				 		{!! Form::label('emergency_exit', 'Total Emergency Exits:', array('class' => '')) !!}
				 		{!! Form::text('emergency_exit', null, array('class' => 'form-control', 'required' => '')) !!}
				 	</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-6">
				 		{!! Form::label('storey', 'Total Storeys:', array('class' => '')) !!}
				 		{!! Form::text('storey', null, array('class' => 'form-control', 'required' => '')) !!}
				 	</div>
				 	<div class="col-md-6">
				 		{!! Form::label('nearest_buildings', 'Buildings Within 50 Feet:', array('class' => '')) !!}
				 		{!! Form::text('nearest_buildings', null, array('class' => 'form-control', 'required' => '')) !!}
				 	</div>
				</div>
			  </div>
			</div>

			<div class="panel panel-default">
			  <div class="panel-heading">File uploads (ফাইল আপলোড) [pdf or image file]</div>
			  <div class="panel-body">
			  	<div class="row">
				 	<div class="col-md-6">
				 		{!! Form::label('layoutplan', 'Industrial Lay-out Plan', ['class' => '']) !!}
						{!! Form::file('layoutplan', ['data-parsley-filemaxmegabytes' => '0.3', 'data-parsley-trigger' => 'change', 'data-parsley-filemimetypes' => 'application/pdf, image/jpeg, image/png', 'class'=> '', 'required' => '']) !!}
				 	</div>
				 	<div class="col-md-6">
				 		{!! Form::label('ownershipdocument', 'Ownership Documents/ House rent Agreement', ['class' => '']) !!}
						{!! Form::file('ownershipdocument', ['data-parsley-filemaxmegabytes' => '0.3', 'data-parsley-trigger' => 'change', 'data-parsley-filemimetypes' => 'application/pdf, image/jpeg, image/png', 'class'=> '', 'required' => '']) !!}
				 	</div>
				</div>
				<hr>
			  	<div class="row">
				 	<div class="col-md-6">
				 		{!! Form::label('tradelicense', 'Trade License', ['class' => '']) !!}
						{!! Form::file('tradelicense', ['data-parsley-filemaxmegabytes' => '0.3', 'data-parsley-trigger' => 'change', 'data-parsley-filemimetypes' => 'application/pdf, image/jpeg, image/png', 'class'=> '', 'required' => '']) !!}
				 	</div>
				 	<div class="col-md-6">
				 		{!! Form::label('tinpaper', 'TIN Certificate', ['class' => '']) !!}
						{!! Form::file('tinpaper', ['data-parsley-filemaxmegabytes' => '0.3', 'data-parsley-trigger' => 'change', 'data-parsley-filemimetypes' => 'application/pdf, image/jpeg, image/png', 'class'=> '', 'required' => '']) !!}
				 	</div>
				</div>
				<hr>
				<div class="row">
				 	<div class="col-md-6">
				 		{!! Form::label('bankcertificate', 'Bank Certificate', ['class' => '']) !!}
						{!! Form::file('bankcertificate', ['data-parsley-filemaxmegabytes' => '0.3', 'data-parsley-trigger' => 'change', 'data-parsley-filemimetypes' => 'application/pdf, image/jpeg, image/png', 'class'=> '', 'required' => '']) !!}
				 	</div>
				</div> 
			  </div>
			</div>

			<div class="panel panel-default">
			  <div class="panel-heading">ক্যাপচা</div>
			  <div class="panel-body">
			  	<div class="row">
			  		<div class="col-md-12">
			  			{!! app('captcha')->display(); !!}
			  		</div>
			  	</div>
			  </div>
			</div>
			
			 	{!! Form::submit('Submit for Verification', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top:20px;')) !!}
			
			{!! Form::close() !!}

			@endif
		</div>
	</div>

@endsection

@section('script')
	{!!Html::script('js/parsley.min.js')!!}
	{!!Html::script('js/select2.min.js')!!}
	<script type="text/javascript">
		$(".select2-multi").select2({
		  maximumSelectionLength: 5
		});
	</script>
	<script type="text/javascript">
		var app = app || {};

		// Utils
		(function ($, app) {
		    'use strict';

		    app.utils = {};

		    app.utils.formDataSuppoerted = (function () {
		        return !!('FormData' in window);
		    }());

		}(jQuery, app));

		// Parsley validators
		(function ($, app) {
		    'use strict';

		    window.Parsley
		        .addValidator('filemaxmegabytes', {
		            requirementType: 'string',
		            validateString: function (value, requirement, parsleyInstance) {

		                if (!app.utils.formDataSuppoerted) {
		                    return true;
		                }

		                var file = parsleyInstance.$element[0].files;
		                var maxBytes = requirement * 1048576;

		                if (file.length == 0) {
		                    return true;
		                }

		                return file.length === 1 && file[0].size <= maxBytes;

		            },
		            messages: {
		                en: 'File is to big (Select a photo within 300KB)'
		            }
		        })
		        .addValidator('filemimetypes', {
		            requirementType: 'string',
		            validateString: function (value, requirement, parsleyInstance) {

		                if (!app.utils.formDataSuppoerted) {
		                    return true;
		                }

		                var file = parsleyInstance.$element[0].files;

		                if (file.length == 0) {
		                    return true;
		                }

		                var allowedMimeTypes = requirement.replace(/\s/g, "").split(',');
		                return allowedMimeTypes.indexOf(file[0].type) !== -1;

		            },
		            messages: {
		                en: 'File mime type not allowed'
		            }
		        });

		}(jQuery, app));


		// Parsley Init
		(function ($, app) {
		    'use strict';

		    $('#js-file-validation-example').parsley();

		}(jQuery, app));

	</script>
		{!!Html::script('js/dtpui.js')!!}
	    <script>
			$(function() {
				$('#fire_extinguisher_exp_date').datepicker({
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
			            $('#fire_extinguisher_exp_date').val(datetext);
			        },
			    });
			}); 
	    </script>
@endsection
