@extends('layout.admin.master')
@section('content')
<div>
    <h1>{{ __('category.Create Category')}}</h1>
    <a href="{{route('category.index')}}" class="btn btn-back">{{ __('category.Back')}}</a>
</div>
<form class="row" action="{{route('category.store')}}" method="POST">
    @csrf
    <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="">
        @error('title')
        <span style="color: red;">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{ __('category.Description')}}</label>
        <input type="text" name="description" class="form-control" id="exampleFormControlInput1" placeholder="">
        @error('description')
        <span style="color: red;">{{$message}}</span>
        @enderror
    </div>

    <div class="clearfix"></div>
    <div class="bt">
        <button type="submit" class="btn btn-primary">{{ __('category.Save')}}</button>
        <button type="button" class="btn btn-secondary">{{ __('category.Reset')}}</button>
    </div>
</form>
@endsection