@extends('layout.admin.master')

@section('content')
            <div>
                <h1>Permission group list</h1>                
                <a href="{{route('permission-group.index')}}" class="btn btn-new" style="margin-left: 8px;" >Back</a>
            </div>
            <table class="table">
                <thead>
                    
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                    @if(!empty($permissionGroup))
                        <tr>
                            <td>{{$permissionGroup['id']}}</td>
                            <td>{{$permissionGroup['name']}}</td>
                            <td>{{$permissionGroup['created_at']}}</td>
                            <td>{{$permissionGroup['updated_at']}}</td>
                        </tr>
                        
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