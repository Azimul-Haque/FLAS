@extends('main')

@section('title', 'FLAS | Inspection')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}

@endsection


@section('content')

  <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Application Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Create New Application!!!</a>
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
        <a class="btn btn-info btn-sm" href="{{ route('inspections.show',$application->id) }}"><i class="fa fa-user" aria-hidden="true"></i> Show</a>
        <a class="btn btn-primary btn-sm" href="{{ route('inspections.inspect',$application->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Inspect</a>
        <?php $deleteTitle = "<i class='fa fa-trash' aria-hidden='true'></i> Delete"?>
        {!! Form::open(['method' => 'DELETE','route' => ['inspections.destroy', $application->id],'style'=>'display:inline']) !!}
            {{Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm'))}}
            {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
    </table>
    {!! $applications->links() !!}
@endsection

@section('script')
  {!!Html::script('')!!}
@endsection