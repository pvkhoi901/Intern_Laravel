@extends('layout.admin.master')
@section('content')
            <div>
                <h1>{{ __('category.Category List')}}</h1>
                <a href="{{route('category.create')}}" class="btn btn-new">{{ __('category.+Addnew')}}</a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">{{ __('category.Category_id')}}</th>
                    <th scope="col">{{ __('category.Name')}}</th>
                    <th scope="col">{{ __('category.Description')}}</th>
                    <th scope="col">{{ __('category.Action')}}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Aza</td>
                    <td>Hoa</td>
                    <td><button type="button" class="btn btn-primary">{{ __('category.Edit')}}</button> <button type="button" class="btn btn-danger">{{ __('category.Delete')}}</button></td>
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