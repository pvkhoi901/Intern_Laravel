@extends('layout.admin.master')

@section('content')
@if (empty($category))
<form class="container-fluid" method="post" action="{{ route('category.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{ __('category.Create Category')}} </h3>
      @elseif(isset($show))
        <form class="container-fluid" action=""> 
        <div class="row">
        <div class="d-flex justify-content-between">
        <h3> {{ __('category.Show Category') }} </h3>
      @else
      <form class="container-fluid" method="post" action="{{ route('category.update', $category->id) }}">
        @method('PUT')
        @csrf
        <div class="row">
          <div class="d-flex justify-content-between">
            <h3>{{ __('category.Edit Category')}}  </h3>
        @endif
            <a href="{{ route('category.index') }}" class="btn btn-primary">
              Back
            </a>
          </div>
        </div>
        <table class="table">
          <thead>

            <tr>
              <th scope="col">{{ __('category.Id')}}</th>
              <th scope="col">{{ __('category.Name')}}</th>
              <th scope="col">{{ __('category.Slug')}}</th>
              <th scope="col">{{ __('category.Created At')}}</th>
              <th scope="col">{{ __('category.Updated At')}}</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @if(!empty($category))
            <tr>
              <td>{{$category['id']}}</td>
              <td>{{$category['name']}}</td>
              <td>{{$category['slug']}}</td>
              <td>{{$category['created_at']}}</td>
              <td>{{$category['updated_at']}}</td>
            </tr>

            @endif
            </tr>
          </tbody>
        </table>
        <div class="container-fluid">
          <label for="name" class="form-label">{{ __('category.Name')}}  </label>
          <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $category->name ?? '') }}"  <?php if ((isset($show))) echo 'readonly' ?>>
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="container-fluid">
          <label for="slug" class="form-label">{{ __('category.Slug')}}  </label>
          <input name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="" value="{{ old('slug', $category->slug ?? '') }}" <?php if ((isset($show))) echo 'readonly' ?>>
          @error('slug')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        @if(!isset($show))
        <div class="row mt-3">
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">
            {{ __('category.Save')}}
            </button>
          </div>
        </div>
        @endif
      </form>
      @endsection