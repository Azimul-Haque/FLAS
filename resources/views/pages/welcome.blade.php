<html>
<head>
  <meta charset="UTF-8" />
  <title>Fire License Automation System</title>
    {!!Html::style('css/styles.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    <script src="js/banglaCalender.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <style type="text/css">
      .linkbox{
        min-height: 200px !important;
      }
      ul.caption{
        list-style: none;
      }
      /*CSS for Navbar*/
      .navbar-custom {
          background-color:#229922;
          color:#ffffff;
          border-radius:0;
      }

      .navbar-custom .navbar-nav > li > a {
          color:#fff;
      }
      .navbar-custom .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus {
          color: #ffffff;
          background-color:transparent;
      }
      .navbar-custom .navbar-brand {
          color:#eeeeee;
      }
      /*CSS for Navbar*/
    </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
      <div class="" style="background: #bbdefb;">
        <div class="">
          <i class="fa fa-folder-open-o" aria-hidden="true"></i> 
            <a href="http://www.fireservice.gov.bd/">বাংলাদেশ জাতীয় তথ্য বাতায়ন</a>

            <span class="right">
              <script type="text/javascript">
                var todaydate=new Date();
                todaydate.setTime(todaydate.getTime() +(todaydate.getTimezoneOffset()+360)*60*1000); 
                var curmonth=todaydate.getMonth()+1; //get current month (1-12)
                var curyear=todaydate.getFullYear(); //get current year
                document.write(oneDay());
              </script>
            </span>
            <div class="">
              <center>
                <table class="">
                  <tr>
                    <td><img class="img-responsive" style="width: 70px;" src="images/fslogo.png"></td>
                    <td><a style="text-decoration: none; font-size: 40px;" href="/">ফায়ার লাইসেন্স অটোমেশন সিস্টেম</a></td>
                  </tr>
                </table> 
              </center>
            </div>
        </div>
      </div>
           <div id="hero-wrapper">
            <div class="carousel-wrapper">
              <div id="hero-carousel" class="carousel slide carousel-fade">
                <ol class="carousel-indicators">
                  <li data-target="#hero-carousel" data-slide-to="0" class="active"></li>
                  <li data-target="#hero-carousel" data-slide-to="1"></li>
                  <li data-target="#hero-carousel" data-slide-to="2"></li>
                  <li data-target="#hero-carousel" data-slide-to="3"></li>
                  <li data-target="#hero-carousel" data-slide-to="4"></li>
                  <li data-target="#hero-carousel" data-slide-to="5"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="{{url('/images/slides/1.jpg')}}" width="100%">
                  </div>
                  <div class="item">
                    <img src="{{url('/images/slides/2.jpg')}}" width="100%">
                  </div>
                  <div class="item">
                    <img src="{{url('/images/slides/3.jpg')}}" width="100%">
                  </div>
                  <div class="item">
                    <img src="{{url('/images/slides/4.jpg')}}" width="100%">
                  </div>
                  <div class="item">
                    <img src="{{url('/images/slides/5.jpg')}}" width="100%">
                  </div>
                  <div class="item">
                    <img src="{{url('/images/slides/6.jpg')}}" width="100%">
                  </div>
                  <div class="item">
                    <img src="{{url('/images/slides/7.jpg')}}" width="100%">
                  </div>
                  <div class="item">
                    <img src="{{url('/images/slides/8.jpg')}}" width="100%">
                  </div>
                </div>
                <a class="left carousel-control" href="#hero-carousel" data-slide="prev">
                  <i class="fa fa-chevron-left left"></i>
                </a>
                <a class="right carousel-control" href="#hero-carousel" data-slide="next">
                  <i class="fa fa-chevron-right right"></i>
                </a>
              </div>
            </div>
          </div> 
      </div>

      <div class="col-md-10 col-md-offset-1">
            <!-- Default Bootstrap Navbar -->
            <nav class="navbar navbar-custom"> <!--USE IT NEAR FUTURE  navbar-fixed-top-->
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> নীড় পাতা</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling-->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    @role('Admin')
                    <li class="dropdown">
                      <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs" aria-hidden="true"></i>  এডমিন <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ url('/admin') }}"><i class="fa fa-users" aria-hidden="true"></i> ইউজার মেনেজমেন্ট</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/roles') }}"><i class="fa fa-wrench" aria-hidden="true"></i>  ভূমিকা অর্পণ </a></li>
                      </ul>
                    </li>
                    @endrole
                    @role('Inspector')
                    <li class="dropdown">
                      <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list-ol" aria-hidden="true"></i> আবেদন নিরীক্ষণ <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li class=""><a href="{{ route('inspections.pending') }}"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Pending Applications</a></li>
                        <li role="separator" class="divider"></li>
                        <li class=""><a href="{{ route('inspections.inspected') }}"><i class="fa fa-hourglass-half" aria-hidden="true"></i> Inspected Applications</a></li>
                        <li role="separator" class="divider"></li>
                        <li class=""><a href="{{ route('inspections.approved') }}"><i class="fa fa-check" aria-hidden="true"></i> Approved Applications</a></li>
                        <li role="separator" class="divider"></li>
                        <li class=""><a href="{{ route('inspections.rejected') }}"><i class="fa fa-ban" aria-hidden="true"></i> Rejected Applications</a></li>
                        <li role="separator" class="divider"></li>
                        <li class=""><a href="{{ route('inspections.expired') }}"><i class="fa fa-clock-o" aria-hidden="true"></i> Expired Applications</a></li>
                      </ul>
                    </li>
                    @endrole
                    @role('Applicant')
                    <li class=""><a href="{{route('applications.create')}}"><i class="fa fa-address-card" aria-hidden="true"></i> আবেদন</a></li>
                    @endrole
                    <li><a href="{{ url('/about') }}"><i class="fa fa-address-book-o" aria-hidden="true"></i> আমাদের সম্পর্কে</a></li>
                    <li><a href="{{ url('/contact') }}"><i class="fa fa-envelope-o" aria-hidden="true"></i> যোগাযোগ</a></li>
                    <li><a href="{{ url('/applicationstatus/search') }}"><i class="fa fa-search" aria-hidden="true"></i> আবেদনের হাল খুঁজুন</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">

                    @if(Auth::check())
                    <li class="dropdown">
                      <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> {{Auth::user()->name}} <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ route('logout') }}" class=""><i class="fa fa-sign-out" aria-hidden="true"></i> লগ আউট</a></li>
                      </ul>
                    </li>
                    @else
                    <li class="dropdown">
                      <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> অ্যাকাউন্ট<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ route('login') }}" class=""><i class="fa fa-sign-in" aria-hidden="true"></i> লগইন</a></li>
                        <li><a href="{{ route('register') }}" class=""><i class="fa fa-user-plus" aria-hidden="true"></i> রেজিস্টার</a></li>
                      </ul>
                    </li>
                    @endif
                  </ul>
                </div>
                <!-- /.navbar-collapse -->
              </div>
              <!-- /.container-fluid -->
            </nav>
      </div>

      <div class="col-md-10 col-md-offset-1">
        <div class="row">
          <div class="col-md-4">
            <div class="panel panel-info linkbox">
              <div class="panel-heading">জরুরী টেলিফোন নম্বরসমূহ</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                   <img src="http://fireservice.portal.gov.bd/sites/default/files/files/fireservice.portal.gov.bd/front_service_box/4f652ad4_3386_4592_b41f_a8e30f6f2ada/logo.jpg" alt="" width="110" height=""/> 
                  </div>
                  <div class="col-md-9">
                    <ul class="caption fade-caption" style="margin:0">
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/site/page/a01a380e-8f40-4dff-b50f-a76ff4af2ebc/বিভাগীয়-নিয়ন্ত্রণ-কক্ষ">বিভাগীয় নিয়ন্ত্রণ কক্ষ</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/site/page/7676b3e3-aa06-4214-91b9-17d4cf042b4e/সকল-স্টেশনের-নম্বর">সকল স্টেশনের নম্বর</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/site/page/33f33c62-0b8c-4aa9-841c-5a4f6beb9561/বেসামরিক-প্রশিক্ষণ-সেল">বেসামরিক প্রশিক্ষণ সেল</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/site/page/5239d671-aa55-4949-9c04-d6894d9c21f2/সেচ্ছাসেবক-প্রশিক্ষণ-সেল">সেচ্ছাসেবক প্রশিক্ষণ সেল</a></li>
                  </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel panel-info linkbox ">
              <div class="panel-heading">সেফটি টিপস</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                   <img src="http://fireservice.portal.gov.bd/sites/default/files/files/fireservice.portal.gov.bd/front_service_box/91464353_8ad7_47e5_9e7e_a10973e474de/images.jpg" alt="" width="110" height=""/> 
                  </div>
                  <div class="col-md-9">
                    <ul class="caption fade-caption" style="margin:0">
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/site/page/fee559e0-f61e-4dde-af37-1c45ce124864/অগ্নি-প্রতিরোধ">অগ্নি প্রতিরোধ</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/site/page/c42a06c4-fc7b-451a-8a7f-c2a1a7b779e2/অগ্নি-নির্বাপন">অগ্নি নির্বাপন</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/">উদ্ধার ও প্রাথমিক চিকিৎসা বিষয়ক</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/site/page/5edb1881-c885-41bc-936f-de95206720cb/ভূমিকম্প-ঝুঁকি">ভূমিকম্প ঝুঁকি</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel panel-info linkbox ">
              <div class="panel-heading">আমাদের সাথে থাকুন</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                   <img src="http://fireservice.portal.gov.bd/sites/default/files/files/fireservice.portal.gov.bd/front_service_box/2bcbac8f_4863_4771_9a5c_bee5d9032589/Facebook-Twitter-Youtube-Google+-icons.jpg" alt="" width="110" height=""/> 
                  </div>
                  <div class="col-md-9">
                    <ul class="caption fade-caption" style="margin:0">
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="https://www.facebook.com/fscd.bd">ফেইসবুক </a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="https://www.youtube.com/channel/UC3wqbphlhKW_lSJfxKIin_A">ইউটিউব</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="https://plus.google.com/109867493422734497103/posts">গুগল প্লাস</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="https://twitter.com/fscd_bd">টুইটার</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel panel-info linkbox ">
              <div class="panel-heading">পরিসংখ্যান</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                   <img src="http://fireservice.portal.gov.bd/sites/default/files/files/fireservice.portal.gov.bd/front_service_box/4df4faae_6cae_4986_acdc_39528374de53/SEO-statastic1.jpg" alt="" width="110" height=""/> 
                  </div>
                  <div class="col-md-9">
                    <ul class="caption fade-caption" style="margin:0">
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/site/page/18e08e09-ad74-4aa6-9494-84d1fdc18ad3/অগ্নিদুর্ঘটনা">অগ্নিদুর্ঘটনা</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/site/page/b4d9b7e2-faf5-4ef9-b12a-d36d5d7ff878/দুর্ঘটনা-ও-উদ্ধার">দুর্ঘটনা ও উদ্ধার</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/site/page/74a72104-f6c4-42d8-9848-f9d2f82ff53b/সেচ্ছাসেবক-প্রশিক্ষণ">সেচ্ছাসেবক প্রশিক্ষণ</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/site/page/be19abdd-7256-48bf-99ba-ac5f0b3d0ee0/প্যাকেজ-প্রশিক্ষণ-">প্যাকেজ প্রশিক্ষণ </a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div> 

            <div class="panel panel-info linkbox ">
              <div class="panel-heading">চলমান/সাম্প্রতিক কার্যক্রম</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                   <img src="http://fireservice.portal.gov.bd/sites/default/files/files/fireservice.portal.gov.bd/front_service_box/8ae1c378_5a4d_4566_a3ee_da4a08b4e2cc/s.jpg" alt="" width="110" height=""/> 
                  </div>
                  <div class="col-md-9">
                    <ul class="caption fade-caption" style="margin:0">
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="#!">মহড়া</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="#!">প্রশিক্ষণ</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="#!">জরিপ ও জনসংযোগ</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="#!">বিভাগীয় কার্যক্রম</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel panel-info linkbox ">
              <div class="panel-heading">আইন, বিধি ও অন্যান্য</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <ul class="caption fade-caption" style="margin:0">
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/site/page/415cbab6-1185-4215-9b4f-95b6ce257487/অগ্নি-প্রতিরোধ-ও-নির্বাপন-আইন-২০০৩">অগ্নি প্রতিরোধ ও নির্বাপন আইন ২০০৩</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/site/page/6bb3bc22-8057-40b8-84f1-31b55bb805c9/এসওডি">এসওডি</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/site/page/3782bcb5-61ec-4bd2-b2ce-e27d30ed3458/সিটিজেন-চার্টার">সিটিজেন চার্টার</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/site/page/12f19069-8def-401f-a6ce-07adaa22cb1a/বার্ষিক-কর্মসম্পাদন-চুক্তি-(এপিএ)">বার্ষিক কর্মসম্পাদন চুক্তি (এপিএ)</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>


          </div>
          <div class="col-md-4">
            <div class="panel panel-info linkbox ">
              <div class="panel-heading">ফায়ার সার্ভিস অ্যাপস</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                   <img src="http://fireservice.portal.gov.bd/sites/default/files/files/fireservice.portal.gov.bd/front_service_box/f6b6fb8c_d728_4f61_93b2_2528739bd4b8/unnamed.png" alt="" width="110" height=""/> 
                  </div>
                  <div class="col-md-9">
                    <ul class="caption fade-caption" style="margin:0">
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="https://play.google.com/store/apps/details?id=com.mcc.fire_service&hl=en">অ্যাপস ডাউনলোড</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="https://play.google.com/store/apps/details?id=com.sktapp.sharemylocation&hl=en">জিপিএস লোকেটিং অ্যাপস</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://fireservice.portal.gov.bd/site/page/781ef866-0b06-4d96-9986-9f1d114fffd2/জিপিএস-লোকেশন-নির্ণয়">জিপিএস লোকেশন নির্ণয়</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel panel-info linkbox ">
              <div class="panel-heading">প্রশাসনিক বিজ্ঞপ্তি</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                   <img src="http://fireservice.portal.gov.bd/sites/default/files/files/fireservice.portal.gov.bd/front_service_box/d3e9d85a_3800_4585_bbaf_3a4f923a0ca2/Notice.jpg" alt="" width="110" height=""/> 
                  </div>
                  <div class="col-md-9">
                    <ul class="caption fade-caption" style="margin:0">
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://fireservice.portal.gov.bd/site/page/88a69080-8451-4df6-806d-c86d3f7c5030/টেন্ডার-সংক্রান্ত">টেন্ডার সংক্রান্ত</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://fireservice.portal.gov.bd/site/notices/de1c0d9b-2f77-4fa6-808a-47abbd63b159/জরুরী-নিয়োগ-বিজ্ঞপ্তি">জরুরী নিয়োগ বিজ্ঞপ্তি</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://fireservice.portal.gov.bd/site/page/946eb76a-c1d5-400c-bbdb-c405d458c9ce/বিভাগীয়-অনাপত্তি-সনদ-সংক্রান্ত">বিভাগীয় অনাপত্তি সনদ সংক্রান্ত</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://fireservice.portal.gov.bd/site/page/05c38d54-b5ac-43eb-929e-9139e35384d8/অফিস-আদেশ-সংক্রান্ত">অফিস আদেশ সংক্রান্ত</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel panel-info linkbox ">
              <div class="panel-heading">বেসামরিক প্রশিক্ষণ সেল</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                   <img src="http://fireservice.portal.gov.bd/sites/default/files/files/fireservice.portal.gov.bd/front_service_box/e72722a8_9399_4374_91a2_0c4d5eaa2475/westin2.jpg" alt="" width="110" height=""/> 
                  </div>
                  <div class="col-md-9">
                    <ul class="caption fade-caption" style="margin:0">
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://fireservice.portal.gov.bd/site/page/9a6b6d12-8440-48b7-9eb4-83a3c5fb9f39/প্যাকেজ-প্রশিক্ষণ">প্যাকেজ প্রশিক্ষণ</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://fireservice.portal.gov.bd/site/page/9c7ad1ef-cf9d-49bb-a32d-11c1137af6e6/অগ্নি-নির্বাপনী-মহড়া">অগ্নি নির্বাপনী মহড়া</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://fireservice.portal.gov.bd/site/page/cd040648-36fd-4593-88aa-1f9e8a165468/রিস্ক-অ্যাসেসমেন্ট-(সার্ভে)">রিস্ক অ্যাসেসমেন্ট (সার্ভে)</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://fireservice.portal.gov.bd">সিডিউল/সার্টিফিকেট</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel panel-info linkbox ">
              <div class="panel-heading">উল্লেখযোগ্য ঘটনাবলী</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                   <img src="http://fireservice.portal.gov.bd/sites/default/files/files/fireservice.portal.gov.bd/front_service_box/740ac4d1_c3c1_49af_814c_3898dfb8c69b/2007-02-27__front02.jpg" alt="" width="110" height=""/> 
                  </div>
                  <div class="col-md-9">
                    <ul class="caption fade-caption" style="margin:0">
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://fireservice.portal.gov.bd/site/page/4f59481f-a936-47c0-942a-3358a8b8e484/অগ্নিনির্বাপন">অগ্নিনির্বাপন</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://fireservice.portal.gov.bd/site/page/869c2bc2-d8b3-4d8f-a5ce-0d15a4351023/উদ্ধার-কর্মক্রম">উদ্ধার কর্মক্রম</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://fireservice.portal.gov.bd/site/page/929b1c27-cf90-4559-b156-9367365b0db5/নৌ-দুর্ঘটনায়-উদ্ধার">নৌ দুর্ঘটনায় উদ্ধার</a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="http://fireservice.portal.gov.bd">বিশেষ অর্জন</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel panel-info linkbox ">
              <div class="panel-heading">প্রশিক্ষণ সেল কার্যক্রম</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                   <img src="http://fireservice.portal.gov.bd/sites/default/files/files/fireservice.portal.gov.bd/front_service_box/16594286_eeb1_4dea_8960_1b8097d90bb2/2.JPG" alt="" width="110" height=""/> 
                  </div>
                  <div class="col-md-9">
                    <ul class="caption fade-caption" style="margin:0">
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="#!">স্বেচ্ছাসেবক বৃদ্ধিকরণ প্রশিক্ষণ </a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="#!">মনো সামাজিক প্রশিক্ষণ </a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="#!">স্বেচ্ছাসেবক সতেজকরণ প্রশিক্ষণ </a></li>
                      <li><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="#!">পেশাগত দক্ষতা বৃদ্ধিকরণ প্রশিক্ষণ </a></li>
                    </ul>
                  </div>
                </div>
              </div> 
            </div>

          </div>
          <div class="col-md-4">
            <div class="panel panel-success">
              <div class="panel-heading">ফায়ার লাইসেন্স অনলাইন আবেদন</div>
              <div class="panel-body">
                <ul class="list-group">
                  <li class="list-group-item">
                    <i class="fa fa-file-word-o" aria-hidden="true"></i> <a href="{{route('applications.create')}}"> আবেদন পত্র</a>
                  </li>
                  <li class="list-group-item">
                    <i class="fa fa-file-text" aria-hidden="true"></i> <a href="{{route('applications.create')}}">আবেদন হাল</a>
                  </li>
                  <li class="list-group-item">
                    <i class="fa fa-globe" aria-hidden="true"></i> <a href="http://www.fireservice.gov.bd/">ফায়ার সার্ভিস ওয়েবসাইট</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="footer">
    <div class="container">
      <hr>
      <p class="text-muted text-center">&copy; {{date('Y')}} Copyright Reserved, Fire License Automation System, BFSCD</p>
    </div>
  </div>
   
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="js/parsley.min.js"></script>
    <script src="js/banglaCalender.js"></script>
  <script>
    $('#carouselHacked').carousel();
  </script>

</body>
</html>