@extends('layout.admin.master')

@section('content')
@if (Session::has('error'))
<div class="alert alert-danger" role="alert">
  {{ session('error') }}
</div>
@endif
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
<div>
  <h1>{{ __('category.Category List')}}</h1>
  <a href="{{route('category.create')}}" class="btn btn-new" style="margin-left: 8px;">{{ __('category.+Addnew')}}</a>
</div>
<table class="table">
  <thead>

    <tr>
      <th scope="col">{{ __('category.Id')}}</th>
      <th scope="col">{{ __('category.Name')}}</th>
      <th scope="col">{{ __('category.Action')}}</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @if(!empty($categories))
      @foreach($categories as $key => $category)
    <tr>
      <td>{{$category['id']}}</td>
      <td>{{$category['name']}}</td>
      <td>
        <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary">{{ __('category.Edit')}}</a>
        <a href="{{route('category.show', $category->id)}}" class="btn btn-success">{{ __('category.Show')}}</a>
        <form class="d-inline" method="post" action="{{route('category.destroy', $category->id)}}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"> {{ __('category.Delete')}} </button>
        </form>
      </td>
    </tr>
    @endforeach
    @endif
    </tr>
  </tbody>
</table>
@endsection