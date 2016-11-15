@extends('main')

@section('title', 'FLAS | Inspection')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}

@endsection


@section('content')

  <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Rejected Applications</h2>
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
        @if ($application->application_status_id > 1)
        <a class="btn btn-primary btn-sm" href="{{ route('inspections.edit',$application->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Inspect Again</a>
        @else
        <a class="btn btn-primary btn-sm" href="{{ route('inspections.inspect',$application->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Inspect</a>
        @endif
        <a class="btn btn-success btn-sm" href="{{ route('inspections.approve',$application->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Approve</a>
      </td>
    </tr>
    @endforeach
    </table>
    {!! $applications->links() !!}
@endsection

@section('script')
  {!!Html::script('')!!}
@endsection