@extends('layout.admin.master')

@section('content')

@if (empty($user))
<form class="container-fluid" method="post" action="{{ route('user.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{ __('user.Create user') }} </h3>
@elseif ($isShow)
<form class="container-fluid" action="">
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{ __('user.Show user:') }} </h3>
@else
<form class="container-fluid" method="post" action="{{ route('user.update', $user->id) }}">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{ __('user.Edit user:') }} </h3>
@endif
      <a href="{{ route('user.index') }}" class="btn btn-primary">
      {{ __('user.Back') }}
      </a>
    </div>
  </div>
  @if (!empty($user))
  <div class="container-fluid">
    <label for="id" class="form-label"> {{ __('user.Id') }} </label>
    <input name="id" id="id" class="form-control mb-2" value="{{ $user->id }}" disabled>
  </div>
  @endif
  <div class="container-fluid">
    <label for="name" class="form-label"> {{ __('user.Name') }} </label>
    <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $user->name ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="email" class="form-label"> {{ __('user.Email') }} </label>
    <input name="email" type="text" class="form-control mb-2 @error('email') is-invalid @enderror" id="email" placeholder="" value="{{ old('email', $user->email ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
    @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="username" class="form-label"> {{ __('user.Username') }} </label>
    <input name="username" type="text" class="form-control mb-2 @error('username') is-invalid @enderror" id="username" placeholder="" value="{{ old('username', $user->username ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
    @error('username')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  @if (empty($user))
  <div class="row">
    <div class="col-md-6">
      <div class="container-fluid">
        <label for="password" class="form-label"> {{ __('user.Password') }} </label>
        <input name="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror" id="password" placeholder=""{{ $isShow ? ' readonly' : ''}}>
        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="col-md-6">
      <div class="container-fluid">
        <label for="password-confirm" class="form-label"> {{ __('user.Password') }} </label>
        <input id="password-confirm" type="password" class="form-control mb-2" name="password_confirmation">
      </div>
    </div>
  </div>
  @endif
  @php
    $selectedRoles = collect(old('role_ids', empty($user) ? [] : $user->roles->pluck('id')->all()));
  @endphp
  <div class="container-fluid">
    <label for="role_ids[]" class="form-label"> {{ __('user.Roles') }} </label>
    @if(!empty($roles))
      <div class="container-fluid">
        @foreach($roles as $role)
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="role_ids[]" id="{{ 'checkbox_'.$role->id }}" value="{{ $role->id }}"{{ ($selectedRoles->contains($role->id)) ? ' checked' : '' }}{{ $isShow ? ' readonly' : ''}}>
          <label class="form-check-label" for="{{ 'checkbox_'.$role->id }}">{{ $role->name }}</label>
        </div>
        @endforeach
      </div>
    @endif
  </div>
  <div class="container-fluid">
    <label for="address" class="form-label"> {{ __('user.Address') }} </label>
    <input name="address" type="text" class="form-control mb-2 @error('address') is-invalid @enderror" id="address" placeholder="" value="{{ old('address', $user->address ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
    @error('address')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="school_id" class="form-label"> {{ __('user.School') }} </label>
    <input name="school_id" id="school_id" class="form-control mb-2" value="{{ '' }}" disabled>
  </div>
  @php
    $types = \App\Models\User::TYPES;
  @endphp
  @if (!empty($user))
  <div class="container-fluid">
    <label for="type" class="form-label"> {{ __('user.User Type') }} </label>
    <input name="type" id="type" class="form-control mb-2" value="{{ empty($user->type) ? 'admin' : array_search($user->type, $types) }}" disabled>
  </div>
  @endif
  <div class="container-fluid">
    <label for="parent_id" class="form-label"> {{ __('user.Parent') }} </label>
    <input name="parent_id" id="parent_id" class="form-control mb-2" value="{{ '' }}" disabled>
  </div>
  @if (!empty($user))
  <div class="container-fluid">
    <label for="verified_at" class="form-label"> {{ __('user.Verified at') }}</label>
    <input name="verified_at" id="verified_at" class="form-control mb-2" value="{{ $user->verified_at }}" disabled>
  </div>
  @endif
  <div class="container-fluid">
    <label for="code" class="form-label"> {{ __('user.Code') }} </label>
    <input name="code" type="text" class="form-control mb-2 @error('code') is-invalid @enderror" id="code" placeholder="" value="{{ old('code', $user->code ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
    @error('code')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="social_type" class="form-label"> {{ __('user.Social Type') }} </label>
    <input name="social_type" type="text" class="form-control mb-2 @error('social_type') is-invalid @enderror" id="social_type" placeholder="" value="{{ old('social_type', $user->social_type ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
    @error('social_type')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="social_id" class="form-label"> {{ __('user.Social Id') }} </label>
    <input name="social_id" type="text" class="form-control mb-2 @error('social_id') is-invalid @enderror" id="social_id" placeholder="" value="{{ old('social_id', $user->social_id ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
    @error('social_id')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="social_name" class="form-label"> {{ __('user.Social Name') }}</label>
    <input name="social_name" type="text" class="form-control mb-2 @error('social_name') is-invalid @enderror" id="social_name" placeholder="" value="{{ old('social_name', $user->social_name ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
    @error('social_name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="social_nickname" class="form-label"> {{ __('user.Social Nickname') }} </label>
    <input name="social_nickname" type="text" class="form-control mb-2 @error('social_nickname') is-invalid @enderror" id="social_nickname" placeholder="" value="{{ old('social_nickname', $user->social_nickname ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
    @error('social_nickname')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="social_avatar" class="form-label"> {{ __('user.Social Avatar') }}</label>
    <input name="social_avatar" type="text" class="form-control mb-2 @error('social_avatar') is-invalid @enderror" id="social_avatar" placeholder="" value="{{ old('social_avatar', $user->social_avatar ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
    @error('social_avatar')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="description" class="form-label"> {{ __('user.Description') }} </label>
    <textarea name="description" type="text" class="form-control mb-2 @error('description') is-invalid @enderror" id="description" placeholder="" value="{{ old('description', $user->description ?? '') }}"{{ $isShow ? ' readonly' : ''}}> </textarea>
    @error('description')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  @if (!empty($user))
  <div class="container-fluid">
    <label for="created_at" class="form-label"> {{ __('user.Created At') }} </label>
    <input name="created_at" id="created_at" class="form-control mb-2" value="{{ $user->created_at }}" disabled>
  </div>
  <div class="container-fluid">
    <label for="updated_at" class="form-label"> {{ __('user.Updated At') }} </label>
    <input name="updated_at" id="updated_at" class="form-control mb-2" value="{{ $user->updated_at }}" disabled>
  </div>
  @endif
  @if (!$isShow)
  <div class="row mt-3">
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">
      {{ __('user.Save') }}
      </button>
    </div>
  </div>
  @endif
</form>
@endsection