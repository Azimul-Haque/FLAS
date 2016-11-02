@extends('main')

@section('title', 'FLAS | Welcome')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}

@endsection


@section('content')

      <div class="row">
        <div class="col-md-8">
          Section 1

        </div>
       
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size: 20px;">Section 2</span></div>
            <div class="panel-body">
              Content
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
      </div>
@endsection

@section('script')
  {!!Html::script('')!!}
@endsection