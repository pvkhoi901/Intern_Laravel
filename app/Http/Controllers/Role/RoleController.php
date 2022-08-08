<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleRequest;
use App\Repositories\Admin\Role\RoleRepository;
use App\Repositories\Admin\PermissionGroup\PermissionGroupRepository;

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
            'permissionGroups' => $this->permissionGroupRepository->getAll(),
        ]);
    }

    public function store(RoleRequest $request)
    {
        $role = $this->roleRepository->save($request->validated());
        $role->permissions()->sync($request->input('permission_ids'));
        return redirect()->route('role.index');
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
        $role = $this->roleRepository->save($request->validated(), ['id' => $id]);
        $role->permissions()->sync($request->input('permission_ids'));

        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        $this->roleRepository->deleteById($id);
        return redirect()->route('role.index');
    }
}
