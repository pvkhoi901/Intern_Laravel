<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/createUser.css">
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top:8px">
                @include('partitions.sidebar')
                <div class="col-md-9">
                    <div>
                        <h1>Send email to user</h1>
                        <a href="{{route('user.index')}}" class="btn btn-back">Back</a>
                    </div>
                    <form class="row" action="{{route('send')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <select name="email" class="form-control" style="margin-top: 20px;">
                                <option value="all">All user</option>
                                @if(!empty($users))
                                    @foreach($users as $key=>$value)
                                    <option value="{{$value['email']}}">{{$value['name']}}</option>
                                    @endforeach
                                @endif                              
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="attachment" class="form-label">File upload</label>
                            <input class="form-control" type="file" id="attachment" name="attachment">
                        </div>
                        
                        <div class="clearfix"></div>
                        <div class="bt">
                        <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                    @if (\Session::has('message'))
                        <div class="alert alert-success">
                            <ul>
                                <li style="list-style-type: none;">{!! \Session::get('message') !!}</li>
                            </ul>
                        </div>
                    @endif
                </div>
        </div>
    </div>
</body>

</html>