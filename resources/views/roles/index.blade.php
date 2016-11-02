@extends('main')

@section('title', 'FLAS | Welcome')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}

@endsection


@section('content')
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Role Management</h2>
          </div>
          <div class="pull-right">
            @permission('role-create')
              <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endpermission
          </div>
      </div>
  </div>
  <table class="table table-bordered">
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Description</th>
      <th width="280px">Action</th>
    </tr>
  @foreach ($roles as $key => $role)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $role->display_name }}</td>
    <td>{{ $role->description }}</td>
    <td>
      <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-user" aria-hidden="true"></i> Show</a>
      @permission('role-edit')
      <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
      @endpermission
      @permission('role-delete')
      {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {{Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm'))}}
          {!! Form::close() !!}
          @endpermission
    </td>
  </tr>
  @endforeach
  </table>
  {!! $roles->render() !!}
@endsection

@section('script')
  {!!Html::script('')!!}
@endsection