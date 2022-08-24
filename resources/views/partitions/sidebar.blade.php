<div class="col-md-3 ">
    <ul>
        <h3>{{ __('sidebar.System') }}</h3>
        <li><a href="{{route('user.index')}}">{{ __('sidebar.User management') }}</a></li>
        <li><a href="{{route('role.index')}}">{{ __('sidebar.Role management') }}</a></li>
        <li><a href="{{route('permission.index')}}">{{ __('sidebar.Permission management') }}</a></li>
        <li><a href="{{route('permission-group.index')}}">{{ __('sidebar.Permission group management') }}</a></li>

    </ul>
    <ul>
        <h3>{{ __('sidebar.Catalog') }}</h3>
        <li><a href="{{route('product.index')}}">{{ __('sidebar.Product management') }}</a></li>
        <li><a href="{{route('category.index')}}">{{ __('sidebar.Category management') }}</a></li>
        <li><a href="{{route('question.index')}}">{{ __('sidebar.Question management') }}</a></li>
        <li><a href="{{route('customer.index')}}">{{ __('sidebar.Customer management') }}</a></li>
    </ul>

</div>