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
<div class="container-fluid">
    <table class="table table-bordered table-all" id="table">
        <div class="row">
            <div class="col-md-7 " style="margin-top: 10px;">
                <div class="main-right">
                    <a style="width:120px;" href="{{route('customer.create')}}" class="btn btn-primary"><i style="padding-right: 5px;" class="fa fa-plus" aria-hidden="true"></i>Thêm mới</a>

                    <a href="" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>Xóa tất cả</a>
                    <a href="" class="btn btn-danger"><i class="fa fa-sign-in" aria-hidden="true"></i>Chuyển người quản lý</a>
                </div>
            </div>
            <div class="col-md-5">
            </div>
        </div>
        <div class="border-top border-primary border-2">
            <form>
                <p>Tìm kiếm</p>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Loại khách</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Người quản lý</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button style="margin-top: -2px;" type="button" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i>Tìm kiếm</button>
                            <button style="margin-top: -2px;" type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i>Hủy lọc</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="border-top border-primary border-2">
            <p>Danh sách thông tin khách hàng</p>
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Loại khách</th>
                    <th scope="col">Mã KH</th>
                    <th scope="col">Thông tin KH</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Người tạo</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($customers))
                @foreach($customers as $key => $customer)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$customer->type}}</td>
                    <td>{{$customer->customer_id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->address}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->user_created}}</td>

                    <td>
                        <a href="{{route('customer.edit', $customer->id)}}" class="btn btn-primary">Edit</a>
                        <form class="d-inline" method="post" action="{{route('customer.destroy', $customer->id)}}">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                    @endforeach
                    @endif
            </tbody>
        </div>
    </table>
</div>
<script type="text/javascript" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#table').DataTable();
    } );
</script>

@endsection