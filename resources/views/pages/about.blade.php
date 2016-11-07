@extends('main')

@section('title', 'FLAS | Welcome')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}

@endsection


@section('content')
      @if(Auth::guest())
        <div class="container">
      @endif
      <div style="background: #f5f5f5; margin-top: -10px; margin-bottom: 10px;">
        <marquee style="padding: 3px;" direction="left" truespeed="10">Notice 1
Notice 2 Notice 3 Notice 4 Notice 5 Notice 6 Notice 7 Notice 8 Notice 9 Notice 10 Notice 11 Notice 12 Notice 13</marquee>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size: 20px;">About</span></div>
            <div class="panel-body">
              This is the sample about page. Sample text. 
            </div>
          </div>
        </div>
       
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size: 20px;">Section 2</span></div>
            <div class="panel-body">
                  <ul>
                    <li>Notice 1</li>
                    <li>Notice 2</li>
                    <li>Notice 3</li>
                    <li>Notice 4</li>
                    <li>Notice 5</li>
                    <li>Notice 6</li>
                    <li>Notice 7</li>
                    <li>Notice 8</li>
                    <li>Notice 9</li>
                    <li>Notice 10</li>
                    <li>Notice 11</li>
                    <li>Notice 12</li>
                    <li>Notice 13</li>
                  </ul>
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