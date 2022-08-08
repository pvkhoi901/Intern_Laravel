@extends('layout.admin.master')
@section('content')
<div>
  <h1>Role list</h1>
  <a href="{{route('role.create')}}" class="btn btn-new">+Addnew</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Admin</th>
    </tr>
  </thead>
  <tbody>
    @if(!empty($roles))
    @foreach($roles as $role)
    <tr>
      <td>{{$role['name']}}</td>
      <td>
        <a href="{{route('role.edit', $role->id)}}" class="btn btn-primary">Edit</a>
        <form class="d-inline" method="post" action="{{ route('role.destroy', $role->id) }}">
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
{{ $roles->links() }}
@endsection