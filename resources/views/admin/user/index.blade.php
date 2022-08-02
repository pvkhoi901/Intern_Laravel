@extends('layout.admin.master')

@section('content')
            <div>
                <h1>UserList</h1>                
                <a href="{{route('user.create')}}" class="btn btn-new" style="margin-left: 8px;" >+Addnew</a>
                <a href="{{route('formSendMail')}}" class="btn btn-new">Send Mail</a>
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
                  @if(!empty($users))
                    @foreach($users as $key => $value)
                    <tr>
                      <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=""></td>
                      <td>{{$value['name']}}</td>
                      <td>{{$value['email']}}</td>
                      <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                    @endforeach
                  @endif
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