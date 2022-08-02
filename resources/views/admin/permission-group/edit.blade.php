@extends('layout.admin.master')
@section('content')
@if (!empty($permissionGroup))
  <form class="container-fluid" method="post" action="{{ route('permission-group.update', $permissionGroup->id) }}">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> Editing permission group: </h3>
      <a href="{{ route('permission-group.index') }}" class="btn btn-primary">
        Back
      </a>
    </div>
  </div>
  <div class="container-fluid">
    <p for="id" class="form-label"> ID </p>
    <p class="form-control"> {{ $permissionGroup->id }} </p>
  </div>
  <div class="container-fluid">
    <label for="name" class="form-label"> Name </label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ $permissionGroup->name }}">
    @error('name')
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
@endif
@endsection