@extends('main')

@section('title', 'FLAS | Create New Post')
@section('stylesheet')
	{!!Html::style('css/styles.css')!!}
	{!!Html::style('css/parsley.css')!!}
	{!!Html::style('css/select2.min.css')!!}
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
			<h1>Apply for License</h1>
			<hr>
			{!! Form::open(['route' => 'applications.store', 'data-parsley-validate' => '', 'files' => 'true', 'enctype' => 'multipart/form-data', 'method' => 'POST']) !!}
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
			 		{!! Form::label('employees', 'Total Employees:', array('class' => '')) !!}
			 		{!! Form::text('employees', null, array('class' => 'form-control', 'required' => '')) !!}
			 	</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-md-6">
			 		{!! Form::label('estd', 'Established:') !!}
			 		{!! Form::text('estd', null, array('class' => 'form-control', 'required' => '')) !!}
			 	</div>
			 	<div class="col-md-6">
			 		{!! Form::label('image', 'Upload Image: (within 300KB)', ['class' => '']) !!}
					{!! Form::file('image', ['data-parsley-filemaxmegabytes' => '0.3', 'data-parsley-trigger' => 'change', 'data-parsley-filemimetypes' => 'image/jpeg, image/png', 'class'=> '']) !!}
			 	</div>
			</div>
			 	
			 	{!! Form::submit('Submit for Verification', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top:20px;')) !!}
			{!! Form::close() !!}
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
@endsection
