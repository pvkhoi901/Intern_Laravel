@extends('layout.admin.master')
@section('content')
@if (Session::has('error'))
<div class="alert alert-danger" role="alert">
  {{ session('error') }}
</div>
@endif
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
<div>
  <h1>{{ __('role.RoleList') }}</h1>
  <a href="{{route('role.create')}}" class="btn btn-new">{{ __('role.+Addnew') }}</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">{{ __('role.Id')}}</th>
      <th scope="col">{{ __('role.Name') }}</th>
      <th scope="col">{{ __('role.Permission Count') }}</th>
      <th scope="col">{{ __('role.Action') }}</th>
    </tr>
  </thead>
  <tbody>
    @if(!empty($roles))
    @foreach($roles as $role)
    <tr>
      <td>{{$role->id}}</td>
      <td>{{$role->name}}</td>
      <td>{{$role->permissions->count()}}</td>
      <td>
        <a href="{{route('role.edit', $role->id)}}" class="btn btn-primary">{{ __('role.Edit') }}</a>
        <a href="{{route('role.show', $role->id)}}" class="btn btn-success">{{ __('role.Show') }}</a>

        <form class="d-inline" method="post" action="{{ route('role.destroy', $role->id) }}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" > {{ __('role.Delete') }} </button>
        </form>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{{ $roles->links() }}
@endsection