@extends('layout.admin.master')

@section('content')
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger" role="alert">
  {{ session('error') }}
</div>
@endif
<div>
  <h1>{{ __('user.UserList') }}</h1>
  <a href="{{route('user.create')}}" class="btn btn-new" style="margin-left: 8px;">{{ __('user.+Addnew') }}</a>
  <a href="{{route('formSendMail')}}" class="btn btn-new">{{ __('user.Send Mail') }}</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">{{ __('user.Avatar') }}</th>
      <th scope="col">{{ __('user.Name') }}</th>
      <th scope="col">{{ __('user.Email') }}</th>
      <th scope="col">{{ __('user.Roles') }}</th>
      <th scope="col">{{ __('user.Action') }}</th>
    </tr>
  </thead>
  <tbody>
    @if(!empty($users))
    @foreach($users as $key => $user)
    <tr>
      <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=""></td>
      <td>{{$user['name']}}</td>
      <td>{{$user['email']}}</td>
      <td>
          @foreach($user->roles as $role)
             {{ $role->name }}
          <br>
          @endforeach
      </td>
      <td>
        <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary">{{ __('user.Edit') }}</a>
        <a href="{{route('user.show', $user->id)}}" class="btn btn-success">{{ __('user.Show') }}</a>

        <form class="d-inline" method="post" action="{{ route('user.destroy', $user->id) }}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger"> {{ __('user.Delete') }} </button>
        </form>
      </td>
      @endforeach
      @endif
  </tbody>
</table>
{{ $users->links() }}
@endsection

