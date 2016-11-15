@extends('main')

@section('title', 'FLAS | Inspection')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}

@endsection


@section('content')

  <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pending Applications</h2>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>Company</th>
        <th>Applicant</th>
        <th>Issued</th>
        <th>Status</th>
        <th width="280px">Action</th>
      </tr>
    @foreach ($applications as $application)
    <tr>
      <td>{{ $application->id }}</td>
      <td>{{ $application->company_name }}</td>
      <td>{{ $application->user->name }}</td>
      <td>{{ date('F d, Y | h:i A', strtotime($application->created_at))}}, {{ $application->created_at->diffForHumans() }} </td>
      <td>{{ $application->application_status->display_name }}</td>
      <td>

        <a class="btn btn-primary btn-sm" href="{{ route('inspections.inspect',$application->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Inspect Application</a>
      </td>
    </tr>
    @endforeach
    </table>
    {!! $applications->links() !!}
@endsection

@section('script')
  {!!Html::script('')!!}
@endsection