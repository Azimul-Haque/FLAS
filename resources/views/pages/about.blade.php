@extends('main')

@section('title', 'FLAS | Welcome')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}

@endsection


@section('content')
      @if(Auth::guest())
        <div class="container">
      @endif
      <div class="row">
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size: 20px;">ইতিহাস</span></div>
            <div class="panel-body" style="text-align: justify;">
              ফায়ার সার্ভিস ও সিভিল ডিফেন্স অধিদপ্তর গণপ্রজাতন্ত্রী বাংলাদেশ সরকারের স্বরাষ্ট্র মন্ত্রণালয়াধীন একটি জরুরী সেবামূলক প্রতিষ্ঠান। এ প্রতিষ্ঠানের সকল কার্যক্রম জনগণের সেবায় নিবেদিত। তৎকালীন বৃটিশ সরকার অবিভক্ত ভারতে ১৯৩৯-৪০ অর্থ সালে ফায়ার সার্ভিস সৃষ্টি করেন। বিভক্তিকালে আঞ্চলিক পর্যায়ে কলকাতা শহরের জন্য কলকাতা ফায়ার সার্ভিস এবং অবিভক্ত বাংলায় বাংলার জন্য (কলকাতাবাদে) বেঙ্গল ফায়ার সার্ভিস সৃষ্টি করেন। ১৯৪৭ সনে এ অঞ্চলের ফায়ার সার্ভিসকে পূর্ব পাকিস্তান ফায়ার সার্ভিস নামে অভিহিত করা হয়। অনুরূপভাবে দ্বিতীয় মহাযুদ্ধের সময় ভারতে বে-সামরিক প্রতিরক্ষা বিভাগ প্রাথমিক পর্যায়ে Air Raid Precautions (ARP) এবং পরবর্তী পর্যায়ে ১৯৫১ সনে আইনী প্রক্রিয়ায় সিভিল ডিফেন্স অধিদপ্তর সৃজিত হয়। কর্মব্যবস্থাপনার লক্ষ্যে সড়ক ও জনপথ বিভাগের অধীন রেসকিউ বিভাগ নামে ১টি বিভাগ সৃষ্টি হয়। <br/><br/>
              ১৯৮২ সালে তৎকালীন ফায়ার সার্ভিস পরিদপ্তর, সিভিল ডিফেন্স পরিদপ্তর এবং সড়ক ও জনপথ বিভাগের উদ্ধার পরিদপ্তর-এই তিনটি পরিদপ্তরের সমন্বয়ে বর্তমান ফায়ার সার্ভিস ও সিভিল ডিফেন্স অধিদপ্তরটি গঠিত হয়।
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size: 20px;">অর্গানোগ্রাম</span></div>
            <div class="panel-body" style="text-align: justify;">
              <img src="{{url('/images/organogram.jpg')}}" class="img-responsive">
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
  {!!Html::script('')!!}
@endsection