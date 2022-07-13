<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/createUser.css">

</head>

<body>
    <div class="container">
        <div class="row" style="margin-top:8px">
                <div class="col-md-3 " >
                    <ul> 
                        <h3>System</h3>
                        <li><a href="{{route('listUser')}}">User management</a></li>
                        <li><a href="">Role management</a></li>
                        <li><a href="">Permission management</a></li>
                    </ul>
                    <ul> 
                        <h3>Catalog</h3>   
                        <li><a href="">Product management</a></li>
                        <li><a href="">Category management</a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div>
                        <h1>Create a user</h1>
                        <a href="{{route('listUser')}}" class="btn btn-back">Back</a>
                    </div>
                    <form class="row" action="" method="POST">
                        @csrf
                        <div class="col-md-12 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="email" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tên">
                        @error('name')
                            <span style = "color: red;">{{$messages}}</span>
                        @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập email của bạn">
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập password">
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password confirm</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập lại password">
                        </div>
                        <div class="col-md-12 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập Address">
                        </div>
                        <div class="col-md-12 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Facebook</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="http://example.com">
                        </div>
                        <div class="col-md-12 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Youtobe</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="http://example.com">
                        </div>
                        <div class="col-md-12 mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripion</label>
                         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <div class="bt">
                        <button type="button" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</body>

</html>