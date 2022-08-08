@extends('layout.admin.master')

@section('content')
@if (empty($role))
<form class="container-fluid" method="post" action="{{ route('role.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      @if(!empty($role_show))
      <h3> Show role: </h3>
      @else
      <h3> Create role: </h3>
      @endif
@else
<form class="container-fluid" method="post" action="{{ route('role.update', $role->id) }}">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> Edit role: </h3>
@endif
      <a href="{{ route('role.index') }}" class="btn btn-primary">
        Back
      </a>
    </div>
  </div>
@if(!empty($role_show))
  
  <table class="table">
          <thead>
            <tr>
              <th scope="col">Role_name</th>
              <th scope="col">Created_at</th>
              <th scope="col">Updated_at</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$role_show->name}}</td>
              <td>{{$role_show['created_at']}}</td>
              <td>{{$role_show['updated_at']}}</td>
            </tr>
          </tbody>
    </table>
    
@else
  @if (!empty($role))
  <div class="container-fluid">
    <p class="form-label"> ID </p>
    <p class="form-control"> {{ $role->id }} </p>
  </div>
  @endif
  <div class="container-fluid">
    <label for="name" class="form-label"> Name </label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $role->name ?? '') }}">
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  @php
    $selected = collect([]);
    if (!empty(old('permission_ids'))) {
      $selected = collect(old('permission_ids', []));
    } else if (!empty($role)) {
      $selected = $role->permissions;
    }
  @endphp
  <div class="container-fluid mt-3">
  <label for="" class="form-label"> Permission Groups </label>
  @if(!empty($permissionGroups))
    @foreach($permissionGroups as $permissionGroup)
      <div class="container-fluid border rounded my-2 px-0 py-3 bg-white shadow-sm">
        <div class="container-fluid">
          <p class="form-label"> {{ $permissionGroup->name }} </p>
        </div>
        <hr>
        <div class="container-fluid">
        @if(!empty($permissionGroup->permissions))
          @foreach($permissionGroup->permissions as $permission)
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="permission_ids[]" id="{{ 'checkbox_'.$permissionGroup->id.'_'.$permission->id }}" value="{{ $permission->id }}"{{ ($selected->contains($permission->id)) ? ' checked' : '' }}>
            <label class="form-check-label" for="{{ 'checkbox_'.$permissionGroup->id.'_'.$permission->id }}">{{ $permission->name }}</label>
          </div>
          @endforeach
        @endif
        </div>
      </div>
    @endforeach
  @endif
  </div>
  <div class="row mt-3">
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">
        Save
      </button>
    </div>
  </div>
@endif
</form>
@endsection