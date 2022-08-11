@extends('layout.admin.master')

@section('content')
            <div>
                <h1>{{ __('user.UserList') }}</h1>                
                <a href="{{route('user.create')}}" class="btn btn-new" style="margin-left: 8px;" >{{ __('user.+Addnew') }}</a>
                <a href="{{route('formSendMail')}}" class="btn btn-new">{{ __('user.Send Mail') }}</a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">{{ __('user.Avatar') }}</th>
                    <th scope="col">{{ __('user.Name') }}</th>
                    <th scope="col">{{ __('user.Email') }}</th>
                    <th scope="col">{{ __('user.Action') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @if(!empty($users))
                    @foreach($users as $key => $value)
                    <tr>
                      <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=""></td>
                      <td>{{$value['name']}}</td>
                      <td>{{$value['email']}}</td>
                      <td><button type="button" class="btn btn-primary">{{ __('user.Edit') }}</button> <button type="button" class="btn btn-danger">{{ __('user.Delete') }}</button></td>
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