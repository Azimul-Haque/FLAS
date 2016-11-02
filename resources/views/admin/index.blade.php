@extends('main')

@section('title', 'FLAS | Welcome')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}

@endsection


@section('content')

  <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.create') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Create New User</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Roles</th>
        <th width="280px">Action</th>
      </tr>
    @foreach ($data as $key => $user)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
        @if(!empty($user->roles))
          @foreach($user->roles as $role)
            <label class="label label-success">{{ $role->display_name }}</label>
          @endforeach
        @endif
      </td>
      <td>
        <a class="btn btn-info btn-sm" href="{{ route('admin.show',$user->id) }}"><i class="fa fa-user" aria-hidden="true"></i> Show</a>
        <a class="btn btn-primary btn-sm" href="{{ route('admin.edit',$user->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
        <?php $deleteTitle = "<i class='fa fa-trash' aria-hidden='true'></i> Delete"?>
        {!! Form::open(['method' => 'DELETE','route' => ['admin.destroy', $user->id],'style'=>'display:inline']) !!}
            {{Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm'))}}
            {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
    </table>
    {!! $data->links() !!}
@endsection

@section('script')
  {!!Html::script('')!!}
@endsection