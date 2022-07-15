<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/listUser.css">
</head>

<body>
<div class="container">
    <div class="row" style="margin-top:8px">
                <div class="col-md-3 main_left" >
                    <ul> 
                        <h3>System</h3>
                        <li><a href="{{route('user.index')}}">User management</a></li>
                        <li><a href="{{route('role.index')}}">Role management</a></li>
                        <li><a href="{{route('category.index')}}">Permission management</a></li>
                    </ul>
                    <ul> 
                        <h3>Catalog</h3>   
                        <li><a href="{{route('product.index')}}">Product management</a></li>
                        <li><a href="">Category management</a></li>
                    </ul>
                </div>
        <div class="col-md-9">
            <div>
                <h1>UserList</h1>
                <a href="{{route('user.create')}}" class="btn btn-new">+Addnew</a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Avatar</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Admin</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=""></td>
                    <td>Aza</td>
                    <td>Aza@gmail.com</td>
                    <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                  </tr>
                    <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png"alt=""></td>
                    <td>Thorn</td>
                    <td>Thorn@gmail.com</td>
                    <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                  </tr>
                    <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=></td>
                    <td>Wish</td>
                    <td>Wish@gmail.com</td>
                    <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                  </tr>
                    <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=""></td>
                    <td>Aya</td>
                    <td>Aya@gmail.com</td>
                    <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                  </tr>
                    <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=""></td>
                    <td>Home</td>
                    <td>Home@gmail.com</td>
                    <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                  </tr>

                </tbody>
              </table>
        </div>

    </div>
 </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
    </nav>

</body>
</html>