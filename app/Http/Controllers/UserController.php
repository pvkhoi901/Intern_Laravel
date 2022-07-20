<?php

namespace App\Http\Controllers;
use App\Http\Requests\User\UserRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

use App\Services\MailService;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    public function sendMailUserProfile(Request $request)
    {
        $users = $request->email == 'all' ? collect(Session::get('users')) : collect(Session::get('users'))->where('email', $request->email);

        $path = public_path('uploads');
        $attachment = $request->file('attachment');

        if(!empty($attachment)) {
            $name = time().'.'.$attachment->getClientOriginalExtension();

            if(!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $attachment->move($path, $name);

            $filename = $path.'/'.$name;

            foreach ($users as $user) {
                $this->mailService->sendUserProfile($user, $filename);
            }
        }else {
            foreach ($users as $user) {
                $this->mailService->sendUserProfile($user, $filename='/');
            }
        }
        
        return redirect()->back()->with('message', 'Gửi mail thành công');

    }

    public function index()
    {
        $users = session()->get('users');
        return view('admin.user.index',[
            'users'=> $users,
        ]);
    }

    public function formSendMail(){
        $users = Session::get('users');
        return view('admin.mail.index', [
            'users'=> $users,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        Session::push('users', $request->only(['name', 'email', 'phone', 'address']));
        return redirect()->route('user.index')->with('message', 'Thêm thành công');
        
    }
    
    
}