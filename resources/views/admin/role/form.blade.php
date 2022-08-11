@extends('layout.admin.master')

@section('content')
@if (Session::has('error'))
<div class="alert alert-danger" role="alert">
  {{ session('error') }}
</div>
@endif
@if (empty($role))
<form class="container-fluid" method="post" action="{{ route('role.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      @if(!empty($role_show))
      <h3> Show role: </h3>
      @else
      <h3>{{ __('role.Create role:') }} </h3>
      @endif
      @else
      <form class="container-fluid" method="post" action="{{ route('role.update', $role->id) }}">
        @method('PUT')
        @csrf
        <div class="row">
          <div class="d-flex justify-content-between">
            <h3>{{ __('role.Edit role:') }}  </h3>
            @endif
            <a href="{{ route('role.index') }}" class="btn btn-primary">
            {{ __('role.Back') }}
            </a>
          </div>
        </div>
        @if(!empty($role_show))

        <table class="table">
          <thead>
            <tr>
              <th scope="col">{{ __('role.Id') }}</th>
              <th scope="col">{{ __('role.Name')}}</th>
              <th scope="col">{{ __('role.Permission count') }}</th>
              <th scope="col">{{ __('role.Created_at') }}</th>
              <th scope="col">{{ __('role.Updated_at') }}</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$role_show->id}}</td>
              <td>{{$role_show->name}}</td>
              <td>{{$role_show->permissions->count()}}</td>
              <td>{{$role_show->created_at}}</td>
              <td>{{$role_show->updated_at}}</td>
            </tr>
          </tbody>
        </table>

        @php
        $selected = collect([]);
        if (!empty($role_show)) {
        $selected = $role_show->permissions;
        }
        if (!empty($selected)) {
        $permissionGroups = [];
        foreach($selected as $permission) {
        if (!in_array($permission->permissionGroup, $permissionGroups)) {
        array_push($permissionGroups, $permission->permissionGroup);
        }
        }
        }
        @endphp
        <p class="form-label">{{ __('role.Permission Groups:')}}</p>
        <div class="container-fluid px-0 mt-3">
          @if(!empty($permissionGroups_show))
          @foreach($permissionGroups_show as $permissionGroup)
          <div class="container-fluid border rounded my-2 px-0 py-3 bg-white shadow-sm">
            <div class="container-fluid">
              <p class="form-label"> {{ $permissionGroup->name }} </p>
            </div>
            <hr>
            <div class="container-fluid">
              @if(!empty($permissionGroup->permissions))
              @foreach($permissionGroup->permissions as $permission)
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="permission_ids[]" id="{{ 'chkbox_'.$permissionGroup->id.'_'.$permission->id }}" value="{{ $permission->id }}" {{ ($selected->contains($permission->id)) ? ' checked' : '' }}>
                <label class="form-check-label" for="{{ 'chkbox_'.$permissionGroup->id.'_'.$permission->id }}">{{ $permission->name }}</label>
              </div>
              @endforeach
              @endif
            </div>
          </div>
          @endforeach
          @endif
        </div>

        @else
        @if (!empty($role))
        <div class="container-fluid">
          <p class="form-label">{{ __('role.Id')}}</p>
          <p class="form-control"> {{ $role->id }} </p>
        </div>
        @endif
        <div class="container-fluid">
          <label for="name" class="form-label"> {{ __('role.Name')}} </label>
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
          <label for="" class="form-label">{{ __('role.Permission Groups')}} </label>
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
                <input class="form-check-input" type="checkbox" name="permission_ids[]" id="{{ 'checkbox_'.$permissionGroup->id.'_'.$permission->id }}" value="{{ $permission->id }}" {{ ($selected->contains($permission->id)) ? ' checked' : '' }}>
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
            {{ __('role.Save')}}
            </button>
          </div>
        </div>
        @endif
      </form>
      @endsection