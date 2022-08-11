@extends('layout.admin.master')

@section('content')
            <div>
                <h1>{{ __('permission_group.Permission group list')}}</h1>                
                <a href="{{route('permission-group.create')}}" class="btn btn-new" style="margin-left: 8px;" >{{ __('permission_group.+Addnew')}}</a>
            </div>
            <table class="table">
                <thead>
                    
                  <tr>
                    <th scope="col">{{ __('permission_group.Id')}}</th>
                    <th scope="col">{{ __('permission_group.Name')}}</th>
                    <th scope="col">{{ __('permission_group.Action')}}</th>
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
                                <a href="{{route('permission-group.edit', $per->id)}}" class="btn btn-primary">{{ __('permission_group.Edit')}}</a>
                                <form class="d-inline" method="post" action="{{ route('permission-group.destroy', $per->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> {{ __('permission_group.Delete')}} </button>
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

