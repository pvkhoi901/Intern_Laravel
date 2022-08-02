@extends('layout.admin.master')
@section('content')
                    <div>
                        <h1>Create role</h1>
                        <a href="{{route('user.index')}}" class="btn btn-back">Back</a>
                    </div>
                    <form class="row" action="{{route('user.store')}}" method="POST">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tên">
                            @error('name')
                                <span style = "color: red;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Role</label>
                            <input type="text" name="role" class="form-control" id="exampleFormControlInput1" placeholder="Nhập chức vụ">
                            @error('role')
                                <span style = "color: red;">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="clearfix"></div>
                        <div class="bt">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
@endsection