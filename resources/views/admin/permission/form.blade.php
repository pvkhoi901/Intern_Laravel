@extends('layout.admin.master')

@section('content')
@if (empty($permission))
<form class="container-fluid" method="post" action="{{ route('permission.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> Create permission: </h3>
@else
<form class="container-fluid" method="post" action="{{ route('permission.update', $permission->id) }}">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> Edit permission: </h3>
@endif
      <a href="{{ route('permission.index') }}" class="btn btn-primary">
        Back
      </a>
    </div>
  </div>
  @if (!empty($permission))
  <div class="container-fluid">
    <p class="form-label"> ID </p>
    <p class="form-control"> {{ $permission->id }} </p>
  </div>
  @endif
  <div class="container-fluid">
    <label for="name" class="form-label"> Name </label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $permission->name ?? '') }}">
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="key" class="form-label"> Key </label>
    <input name="key" type="text" class="form-control @error('key') is-invalid @enderror" id="key" placeholder="" value="{{ old('key', $permission->key ?? '') }}">
      @error('key')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>
  @php
    $selected = null;
    if (!empty(old('permission_group_id'))) {
      $selected = old('permission_group_id');
    } else if (!empty($permission)) {
      $selected = $permission->permissionGroup->id;
    }
  @endphp
  <div class="container-fluid">
    <label for="permission_group_id" class="form-label"> Permission Group </label>
    <select name="permission_group_id" id="permission_group_id" class="form-select @error('permission_group_id') is-invalid @enderror">
      @if (empty($selected))
        <option value="" selected disabled hidden> Select a permission group </option>
      @endif
      @foreach($permissionGroups as $permissionGroup)
        <option value="{{ $permissionGroup->id }}"{{ ($selected == $permissionGroup->id) ? ' selected' : ''}}> {{ $permissionGroup->name }} </option>
      @endforeach
    </select>
    @error('permission_group_id')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="row mt-3">
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">
        Save
      </button>
    </div>
  </div>
</form>
@endsection