<?php

namespace App\Http\Controllers;
use App\Http\Requests\User\CreateUserRequest;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function create(CreateUserRequest $request){

        return view('createUser');
    }
    public function list(){
        return view('listUser');
    }

}
