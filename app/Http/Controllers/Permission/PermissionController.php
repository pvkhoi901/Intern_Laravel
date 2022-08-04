<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\PermissionRequest;
use App\Repositories\Admin\Permission\PermissionRepository;
use App\Repositories\Admin\PermissionGroup\PermissionGroupRepository;

class PermissionController extends Controller
{
    protected $permissionRepository;
    protected $permissionGroupRepository;

    public function __construct(PermissionRepository $permissionRepository, PermissionGroupRepository $permissionGroupRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->permissionGroupRepository = $permissionGroupRepository;
    }

    public function index()
    {
        return view('admin.permission.index', [
            'permissions' => $this->permissionRepository->paginate(),
        ]);
    }

    public function create()
    {
        return view('admin.permission.form', [
            'permissionGroups' => $this->permissionGroupRepository->getAll(),
        ]);
    }

    public function store(PermissionRequest $request)
    {
        $this->permissionRepository->save($request->validated());

        return redirect()->route('permission.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if (! $permission = $this->permissionRepository->findById($id)) {
            abort(404);
        }

        return view('admin.permission.form', [
            'permission' => $permission,
            'permissionGroups' => $this->permissionGroupRepository->getAll(),
        ]);
    }

    public function update(PermissionRequest $request, $id)
    {
        $this->permissionRepository->save($request->validated(), ['id' => $id]);
        return redirect()->route('permission.index');
    }

    public function destroy($id)
    {
        $this->permissionRepository->deleteById($id);
        return redirect()->route('permission.index');
    }
}
