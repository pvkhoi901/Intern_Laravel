<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleRequest;
use App\Repositories\Admin\Role\RoleRepository;
use App\Repositories\Admin\PermissionGroup\PermissionGroupRepository;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    protected $roleRepository;
    protected $permissionGroupRepository;

    public function __construct(RoleRepository $roleRepository, PermissionGroupRepository $permissionGroupRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionGroupRepository = $permissionGroupRepository;
    }

    public function index()
    {
        return view('admin.role.index', [
            'roles' => $this->roleRepository->paginate(),
        ]);
    }

    public function create()
    {
        return view('admin.role.form', [
            'permissionGroups' => $this->permissionGroupRepository->with('permissions')->get(),
        ]);
    }

    public function store(RoleRequest $request)
    {
        DB::beginTransaction();

        try {
            $role = $this->roleRepository->save($request->validated());
            $role->permissions()->sync($request->input('permission_ids'));
            DB::commit();

            return redirect()->route('role.index')->with(
                'success',
                'Created success'
            );
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                'Exception occured. Please try again later.'
            );
        }
    }

    public function show($id)
    {
        if (! $role = $this->roleRepository->findById($id)) {
            abort(404);
        }

        return view('admin.role.form', [
            'role_show' => $role,
            'permissionGroups_show' => $this->permissionGroupRepository->getAll(),
        ]);
    }

    public function edit($id)
    {
        if (! $role = $this->roleRepository->findById($id)) {
            abort(404);
        }

        return view('admin.role.form', [
            'role' => $role,
            'permissionGroups' => $this->permissionGroupRepository->getAll(),
        ]);
    }

    public function update(RoleRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $role = $this->roleRepository->save($request->validated(), ['id' => $id]);
            $role->permissions()->sync($request->input('permission_ids'));
            DB::commit();

            return redirect()->route('role.index')->with(
                'success',
                'Edit success'
            );
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            
            $this->roleRepository->findById($id)->permissions()->detach();
            $this->roleRepository->deleteById($id);
            DB::commit();

            return redirect()->route('role.index')->with(
                'success',
                'Deletion success'
            );
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                'Exception occured. Please try again later.'
            );
        }
    }
}
