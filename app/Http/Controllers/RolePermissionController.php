<?php


namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Services\RolePermissionService;
use App\Http\Resources\PermissionResources;
use App\Http\Resources\RoleResources;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    protected $rolePermissionService;

    public function __construct(RolePermissionService $rolePermissionService)
    {
        $this->rolePermissionService = $rolePermissionService;
    }

    public function showRoles(Request $request)
    {
        $roles = $this->rolePermissionService->showRoles($request->all());
        return RoleResources::collection($roles);
    }

    public function addRole(RoleStoreRequest $request)
    {
        $requestData = $request->only(['name', 'permissions']);
        $role = $this->rolePermissionService->addRole($requestData);
        return $role ? $this->storeTrue('role'):$this->storeFalse('role');
    }

    public function getRoleWithPermissionsById($id)
    {
        $role = $this->rolePermissionService->getRoleWithPermissionsById($id);
        return new RoleResources($role);
    }

    public function updateRole(RoleUpdateRequest $request, $id)
    {
        $requestData = $request->only(['permissions', 'name']);
        $updateRole = $this->rolePermissionService->updateRole($requestData, $id);
        return $updateRole ? $this->updateTrue('role'):$this->updateFalse('role');
    }

    public function deleteRole($id)
    {
        $role = $this->rolePermissionService->deleteRole($id);
        return $role ? $this->destroyTrue('role'):$this->destroyFalse('role');
    }

    public function addPermission(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name'
        ]);

        $requestData = $request->only('name');
        $permission = $this->rolePermissionService->addPermission($requestData);
        return $permission ? $this->storeTrue('permission'):$this->storeFalse('permission');
    }

    public function showPermissions(Request $request)
    {
        $permissions = $this->rolePermissionService->showPermissions($request->all());
        return PermissionResources::collection($permissions);
    }

    public function updatePermission(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name,'.$id
        ]);

        $requestData = $request->only('name');
        $permission = $this->rolePermissionService->updatePermission($requestData, $id);
        return $permission ? $this->updateTrue('permission'):$this->updateFalse('permission');
    }

    public function deletePermission($id)
    {
        $permission = $this->rolePermissionService->deletePermission($id);
        return $permission ? $this->destroyTrue('permission'):$this->destroyFalse('permission');
    }
}
