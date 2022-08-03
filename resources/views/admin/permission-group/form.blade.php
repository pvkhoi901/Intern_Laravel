@extends('layout.admin.master')

@section('content')
@if (empty($permissionGroup))
<form class="container-fluid" method="post" action="{{ route('permission-group.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> Create permission group: </h3>
      @else
      <form class="container-fluid" method="post" action="{{ route('permission-group.update', $permissionGroup->id) }}">
        @method('PUT')
        @csrf
        <div class="row">
          <div class="d-flex justify-content-between">
            <h3> Edit permission group: </h3>
            @endif
            <a href="{{ route('permission-group.index') }}" class="btn btn-primary">
              Back
            </a>
          </div>
        </div>
        <table class="table">
          <thead>

            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Created_at</th>
              <th scope="col">Updated_at</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @if(!empty($permissionGroup))
            <tr>
              <td>{{$permissionGroup['id']}}</td>
              <td>{{$permissionGroup['name']}}</td>
              <td>{{$permissionGroup['created_at']}}</td>
              <td>{{$permissionGroup['updated_at']}}</td>
            </tr>

            @endif
            </tr>
          </tbody>
        </table>
        <div class="container-fluid">
          <label for="name" class="form-label"> Name </label>
          <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $permissionGroup->name ?? '') }}">
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
      @endsection