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
@if (empty($question))
<form class="container-fluid" method="post" action="{{ route('question.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{ __('question.Create Question')}} </h3>
@elseif(isset($show))
<form class="container-fluid" action="">
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{ __('question.Show Question') }} </h3>
@else
<form class="container-fluid" method="post" action="{{ route('question.update', $question->id) }}">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{ __('question.Edit Question') }} </h3>
@endif
      <a href="{{ route('question.index') }}" class="btn btn-primary">
        Back
      </a>
    </div>
  </div>
  <div class="form-group">
    <label>{{ __('question.Content')}}</label>
    <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="3" <?php if ((isset($show))) echo 'readonly' ?>>{{ old('content' , $question->content ?? '') }}</textarea>
    @error('content')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  
  @php
    $selected = null;
    if (!empty(old('category_id'))) {
      $selected = old('category_id');
    } else if (!empty($question)) {
      $selected = $question->category->id;
    }
  @endphp
  <div class="form-group pt-3" style="margin-bottom: 20px;">
    <label for="category_id" class="form-label"> {{ __('question.Category')}} </label>
    <select name="category_id" id="category_id"  class="form-select @error('category_id') is-invalid @enderror">
      @if (empty($selected))
        <option value="" selected disabled hidden > {{ __('question.Select a category')}} </option>
      @endif
      @foreach($categories as $category)
        <option value="{{ $category->id }}" <?php if ((isset($show))) echo 'readonly' ?> {{ ($selected == $category->id) ? ' selected' : ''}}> {{ $category->name }} </option>
      @endforeach
    </select>
    @error('category_id')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
        <div>
            @for($i = 0; $i < 4; $i++) 
            <div class="form-group">
                <label>{{ __('question.Answer')}} {{$i+1}}</label>
            </div>
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-11">
                    <textarea class="form-control @error('answers.content.'.$i) is-invalid @enderror" name="answers[content][]" rows="2" value="" <?php if ((isset($show))) echo 'readonly' ?>>{{isset($question) ? $question->answers[$i]->content : ''}}</textarea>
                </div>
                <div class="col-1" >
                    <input style="height: 50px;" type="radio"   name="radio-answer[correct]" id="radio-{{$i}}" value="{{$i}}" {{( isset($question) && $question->answers[$i]->correct == 1) ? 'checked' : ''}} disable/>
                </div>
            </div>
            @endfor
        </div>   
  @if (!isset($show))
  <div class="row mt-3">
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">
      {{ __('question.Save') }}
      </button>
    </div>
  </div>
  @endif
</form>
@endsection



