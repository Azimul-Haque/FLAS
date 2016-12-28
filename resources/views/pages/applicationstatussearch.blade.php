@extends('main')

@section('title', 'FLAS | Welcome')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}
  {!!Html::style('css/parsley.css')!!}
@endsection


@section('content')
      @if(Auth::guest())
        <div class="container">
      @endif
      <div class="row">
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size: 20px;">আবেদনের হাল খুঁজুন</span></div>
            <div class="panel-body">
              {!! Form::open(['route' => ['applicationstatus.searchresult'],'method'=>'GET', 'data-parsley-validate' => '']) !!}
                      <div class="form-group">
                          <strong>ট্র্যাকিং নাম্বার:</strong>
                          {!! Form::text('tracking_number', null, array('placeholder' => 'ট্র্যাকিং নাম্বার লিখুন','class' => 'form-control', 'required' => '')) !!}
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          {!! app('captcha')->display(); !!}
                        </div>
                      </div><br/>
                      
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search" aria-hidden="true"></i> খুঁজুন</button>
                  </div>
                      </div>
              {!! Form::close() !!}<br/>
              
              @if(!empty($applicationstatus))
              <h3>প্রতিষ্ঠানের নাম: {{ $applicationstatus->company_name }}</h3>
              <h3>আবেদনের হাল (Application Status): {{ $applicationstatus->application_status->display_name }}</h3>
              <h3>আবেদনের তারিখ: {{ date('F d, Y | h:i A', strtotime($applicationstatus->created_at))}}, {{ $applicationstatus->created_at->diffForHumans() }}</h3> 
              @endif

            </div>
          </div>
          {{-- <script src="https://gist.github.com/Azimul-Haque/bc8feaa27d46474bcd70165efad714fd.js"></script> --}}


        </div>
       
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size: 20px;">মিশন</span></div>
            <div class="panel-body">
                  মিশন - “দুর্যোগ-দুর্ঘটনায় জীবন ও সম্পদ রক্ষার মাধ্যমে নিরাপদ বাংলাদেশ গড়ে তোলা”।
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size: 20px;">ভিশন</span></div>
            <div class="panel-body">
                  ভিশন - “২০২১ সালের মধ্যেঅগ্নিকান্ডসহ সকল দুর্যোগ মোকাবেলায় এশিয়ার অন্যতম শ্রেষ্ঠ  প্রতিষ্ঠান হিসেবে  সক্ষমতা অর্জন।”
            </div>
          </div>
        </div>
      </div>

      @if(Auth::guest())
        </div>
      @endif
@endsection

@section('script')
  {!!Html::script('js/parsley.min.js')!!}
@endsection