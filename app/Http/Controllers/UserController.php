<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Repositories\Admin\Role\RoleRepository;
use App\Repositories\Admin\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Services\MailService;

class UserController extends Controller
{
    protected $mailService;
    protected $userRepository;
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository, UserRepository $userRepository, MailService $mailService)
    {
        $this->mailService = $mailService;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function sendMailUserProfile(Request $request)
    {
        $allUser = $this->userRepository->getAll();
        $users = $request->email == 'all' ? collect($allUser) : collect($allUser)->where('email', $request->email);

        $path = public_path('uploads');
        $attachment = $request->file('attachment');

        if (!empty($attachment)) {
            $name = time().'.'.$attachment->getClientOriginalExtension();

            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $attachment->move($path, $name);

            $filename = $path.'/'.$name;

            foreach ($users as $user) {
                $this->mailService->sendUserProfile($user, $filename);
            }
        } else {
            foreach ($users as $user) {
                $this->mailService->sendUserProfile($user, $filename='/');
            }
        }

        return redirect()->back()->with('message', 'Email sent successfully');
    }

    public function index()
    {
        return view('admin.user.index', [
            'users' => $this->userRepository->with('roles')->paginate(),
        ]);
    }

    public function formSendMail()
    {
        return view('admin.mail.index', [
            'users'=> $this->userRepository->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.user.form', [
            'roles' => $this->roleRepository->getAll(),
            'isShow' => false,
        ]);
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['type'] = User::TYPES['admin'];
        $data['password'] = Hash::make($data['password']);

        DB::beginTransaction();

        try {
            $user = $this->userRepository->save($data);
            $user->roles()->sync($request->input('role_ids'));
            DB::commit();

            return redirect()->route('user.index', $user->id)->with(
                'success',
                'Creation completed successfully.'
            );
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                'Exception Occured. Please try again later.'
            );
        }
    }

    public function show($id)
    {
        if (! $user = $this->userRepository->findById($id)) {
            abort(404);
        }

        return view('admin.user.form', [
            'user' => $user,
            'roles' => $this->roleRepository->getAll(),
            'isShow' => true,
        ]);
    }

    public function edit($id)
    {
        if (! $user = $this->userRepository->findById($id)) {
            abort(404);
        }

        return view('admin.user.form', [
            'user' => $user,
            'roles' => $this->roleRepository->getAll(),
            'isShow' => false,
        ]);
    }
    public function update(UserRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $user = $this->userRepository->save($request->validated(), ['id' => $id]);
            $user->roles()->sync($request->input('role_ids'));
            DB::commit();

            return redirect()->route('user.show', $id)->with(
                'success',
                'Edit completed successfully.'
            );
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                'Exception occured. Please try again later.'
            );
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $this->userRepository->findById($id)->roles()->detach();
            $this->userRepository->deleteById($id);
            DB::commit();

            return redirect()->route('user.index')->with(
                'success',
                'Deletion completed successfully.'
            );
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                'Exception occured. Please try again later'
            );
        }
    }
}
