@extends('layout.admin.master')

@section('content')
<div>
    <h1>{{ __('user.Create user') }}</h1>
    <a href="{{route('user.index')}}" class="btn btn-back">{{ __('user.Back') }}</a>
</div>
<form class="row" action="{{route('user.store')}}" method="POST">
    @csrf
    <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{ __('user.Name') }}</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
        @error('name')
        <span style="color: red;">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{ __('user.Email') }}</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="">
        @error('email')
        <span style="color: red;">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{ __('user.Password') }}</label>
        <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="">
        @error('password')
        <span style="color: red;">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{ __('user.Password confirm') }}</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="">
    </div>
    <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{ __('user.Address') }}</label>
        <input name="address" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
    </div>
    <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Facebook</label>
        <input type="text" name="facebook" class="form-control" id="exampleFormControlInput1" placeholder="">
        @error('facebook')
        <span style="color: red;">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Youtube</label>
        <input type="text" name="youtube" class="form-control" id="exampleFormControlInput1" placeholder="">
        @error('youtube')
        <span style="color: red;">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">{{ __('user.Description') }}</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="clearfix"></div>
    <div class="bt">
        <button type="submit" class="btn btn-primary">{{ __('user.Save') }}</button>
        <button type="button" class="btn btn-secondary">{{ __('user.Reset') }}</button>
    </div>
</form>
@endsection