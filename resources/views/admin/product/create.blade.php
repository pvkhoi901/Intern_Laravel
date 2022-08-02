@extends('layout.admin.master')
@section('content')
                    <div>
                        <h1>Create Product</h1>
                        <a href="{{route('product.index')}}" class="btn btn-back">Back</a>
                    </div>
                    <form class="row" action="{{route('product.store')}}" method="POST">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tên product">
                            @error('name')
                                <span style = "color: red;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" id="exampleFormControlInput1" placeholder="Nhập mô tả sản phẩm">
                            @error('description')
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