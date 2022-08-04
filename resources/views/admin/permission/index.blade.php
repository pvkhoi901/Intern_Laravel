@extends('layout.admin.master')
@section('content')
<div>
  <h1>Permission list</h1>
  <a href="{{route('permission.create')}}" class="btn btn-new">+Addnew</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Key</th>
      <th scope="col">Permission_group_id</th>
      <th scope="col">Admin</th>
    </tr>
  </thead>
  <tbody>
    @if(!empty($permissions))
    @foreach($permissions as $per)
    <tr>
      <td>{{$per['name']}}</td>
      <td>{{$per['key']}}</td>
      <td>{{$per['permission_group_id']}}</td>
      <td>
        <a href="{{route('permission.edit', $per->id)}}" class="btn btn-primary">Edit</a>
        <form class="d-inline" method="post" action="{{ route('permission.destroy', $per->id) }}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger"> Delete </button>
        </form>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{{ $permissions->links() }}
@endsection