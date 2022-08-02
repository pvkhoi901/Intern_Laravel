@extends('layout.admin.master')
@section('content')
            <div>
                <h1>Role list</h1>
                <a href="{{route('role.create')}}" class="btn btn-new">+Addnew</a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Avatar</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Admin</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=""></td>
                    <td>Aza</td>
                    <td>Leader</td>
                    <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                  </tr>
                    <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png"alt=""></td>
                    <td>Thorn</td>
                    <td>Developer</td>
                    <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                  </tr>
                    <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=></td>
                    <td>Wish</td>
                    <td>Developer</td>
                    <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                  </tr>
                    <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=""></td>
                    <td>Aya</td>
                    <td>Intern</td>
                    <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                  </tr>
                    <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=""></td>
                    <td>Home</td>
                    <td>Intern</td>
                    <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                  </tr>

                </tbody>
              </table>
@endsection

@section('page-navigation')
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
@endsection
