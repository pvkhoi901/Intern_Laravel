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
              {{ $permissionGroup->links() }}
@endsection

