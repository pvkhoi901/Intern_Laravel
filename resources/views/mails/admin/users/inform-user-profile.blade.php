<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    
</head>
<body>
    <div class="container">
        <h4>Hi,</h4>
        <h4>This email send from system </h4><br>
        <h4>Please check your infomation. Is it correctly</h4><br>
        <ul class="list-group" >
            <li class="list-group-item" style="list-style-type: none;">Name: 
                <span class="float-end">{{$user['name']}}</span>
             </li>
             <li class="list-group-item" style="list-style-type: none;" >Email: 
                <span class="float-end">{{$user['email']}}</span>
             </li>
             <li class="list-group-item" style="list-style-type: none;" >Address:
                <span class="float-end">{{$user['address']}}</span>
             </li>
             <li class="list-group-item" style="list-style-type: none;" >Phone: 
                <span class="float-end">0822055781</span>
             </li>
        </ul>
        <div style="text-align: center; padding-top:20px">
            <button class="btn btn-primary" type="submit">Button</button>
        </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>