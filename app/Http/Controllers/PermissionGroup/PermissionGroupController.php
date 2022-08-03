<?php

namespace App\Http\Controllers\PermissionGroup;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionGroup\PermissionGroupRequest;
use App\Repositories\Admin\PermissionGroup\PermissionGroupRepository;

class PermissionGroupController extends Controller
{
    protected $permissionGroupRepository;

    public function __construct(PermissionGroupRepository $permissionGroupRepository)
    {
        $this->permissionGroupRepository = $permissionGroupRepository;
    }

    public function index()
    {
        return view('admin.permission-group.index', [
            'permissionGroup' => $this->permissionGroupRepository->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission-group.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionGroupRequest $request)
    {
        $this->permissionGroupRepository->save($request->only(['name', 'created_at', 'updated_at']));

        return redirect()->route('permission-group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! $permissionGroup = $this->permissionGroupRepository->findById($id)) {
            abort(404);
        }
        return view('admin.permission-group.show', [
            'permissionGroup' => $permissionGroup,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! $permissionGroup = $this->permissionGroupRepository->findById($id)) {
            abort(404);
        }
        return view('admin.permission-group.form', [
            'permissionGroup' => $permissionGroup,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionGroupRequest $request, $id)
    {
        $this->permissionGroupRepository->save($request->only(['name', 'created_at', 'updated_at']), ['id' => $id]);

        return redirect()->route('permission-group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->permissionGroupRepository->deleteById($id);

        return redirect()->route('permission-group.index');
    }
}
