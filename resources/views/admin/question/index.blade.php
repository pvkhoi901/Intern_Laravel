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
  <h1>{{ __('question.Question List') }}</h1>
  <a href="{{route('question.create')}}" class="btn btn-new" style="margin-left: 8px;">{{ __('question.+Addnew') }}</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">{{ __('question.Id') }}</th>
      <th scope="col">{{ __('question.Content') }}</th>
      <th scope="col">{{ __('question.Category') }}</th>
      <th scope="col">{{ __('question.Action') }}</th>
    </tr>
  </thead>
  <tbody>
    @if(!empty($questions))
    @foreach($questions as  $question)
    <tr>
      <td>{{$question['id']}}</td>
      <td>{{$question['content']}}</td>
      <td>
        {{ $question['category_id'] }}
      </td>
      <td>
        <a href="{{route('question.edit', $question->id)}}" class="btn btn-primary">{{ __('question.Edit') }}</a>
        <a href="{{route('question.show', $question->id)}}" class="btn btn-success">{{ __('question.Show') }}</a>

        <form class="d-inline" method="post" action="{{route('question.destroy', $question->id)}}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger"> {{ __('question.Delete') }} </button>
        </form>
      </td>
      @endforeach
      @endif
  </tbody>
</table>
{{ $questions->links() }}

@endsection

