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
            <div class="panel-heading"><span style="font-size: 20px;">যোগাযোগ ফর্ম (Contact Form)</span></div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <form action="{{ url('contact') }}" method="POST" data-parsley-validate>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label name="email">ইমেইল (Email):</label>
                      <input id="email" name="email" class="form-control" required="">
                    </div>

                    <div class="form-group">
                      <label name="subject">বিষয় (Subject):</label>
                      <input id="subject" name="subject" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label name="message">বার্তা (Message):</label>
                      <textarea id="message" name="message" class="form-control" placeholder="বার্তা লিখুন" required></textarea>
                    </div>

                    <input type="submit" value="বার্তা পাঠান (Send Message)" class="btn btn-success">
                  </form>
                </div>
              </div>
            </div>
          </div>
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