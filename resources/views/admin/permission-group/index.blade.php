@extends('layout.admin.master')

@section('content')
            <div>
                <h1>Permission group list</h1>                
                <a href="{{route('permission-group.create')}}" class="btn btn-new" style="margin-left: 8px;" >+Addnew</a>
            </div>
            <table class="table">
                <thead>
                    
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Admin</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                    @if(!empty($permissionGroup))
                        @foreach($permissionGroup as $key => $per)
                        <tr>
                            <td>{{$per['id']}}</td>
                            <td>{{$per['name']}}</td>
                            <td>
                                <a href="{{route('permission-group.edit', $per->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('permission-group.show', $per->id)}}" class="btn btn-success"> Show </a>
                                <form class="d-inline" method="post" action="{{ route('permission-group.destroy', $per->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> Delete </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
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