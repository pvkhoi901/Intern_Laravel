<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/createUser.css">

</head>

<body>
    <div class="container">
        <div class="row" style="margin-top:8px">
                <div class="col-md-3 " >
                    <ul> 
                        <h3>System</h3>
                        <li><a href="{{route('user.index')}}">User management</a></li>
                        <li><a href="{{route('role.index')}}">Role management</a></li>
                        <li><a href="{{route('permission.index')}}">Permission management</a></li>
                    </ul>
                    <ul> 
                        <h3>Catalog</h3>   
                        <li><a href="{{route('product.index')}}">Product management</a></li>
                        <li><a href="{{route('category.index')}}">Category management</a></li>
                    </ul>
                </div>
                <div class="col-md-9">
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
                </div>
        </div>
    </div>
</body>

</html>