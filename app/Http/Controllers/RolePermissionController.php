<?php


namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Services\RolePermissionService;
use App\Http\Resources\PermissionResources;
use App\Http\Resources\RoleResources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolePermissionController extends Controller
{
    protected $rolePermissionService;
    public $user;

    public function __construct(RolePermissionService $rolePermissionService)
    {
        $this->rolePermissionService = $rolePermissionService;
        $this->user = Auth::user();
    }

    public function showRoles(Request $request)
    {
        if ($this->user->can('show roles')):
            $roles = $this->rolePermissionService->showRoles($request->all());
            return RoleResources::collection($roles);
        else:
            return $this->unAuthorized();
        endif;
    }

    public function addRole(RoleStoreRequest $request)
    {
        if ($this->user->can('create role')):
            $requestData = $request->only(['name', 'permissions']);
            $role = $this->rolePermissionService->addRole($requestData);
            return $role ? $this->storeTrue('role'):$this->storeFalse('role');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function getRoleWithPermissionsById($id)
    {
        if ($this->user->can('edit role')):
            $role = $this->rolePermissionService->getRoleWithPermissionsById($id);
            return new RoleResources($role);
        else:
            return $this->unAuthorized();
        endif;
    }

    public function updateRole(RoleUpdateRequest $request, $id)
    {
        if ($this->user->can('update role')):
            $requestData = $request->only(['permissions', 'name']);
            $updateRole = $this->rolePermissionService->updateRole($requestData, $id);
            return $updateRole ? $this->updateTrue('role'):$this->updateFalse('role');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function deleteRole($id)
    {
        if ($this->user->can('delete role')):
            $role = $this->rolePermissionService->deleteRole($id);
            return $role ? $this->destroyTrue('role'):$this->destroyFalse('role');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function addPermission(Request $request)
    {
        if ($this->user->can('create permission')):
            $this->validate($request, [
                'name' => 'required|unique:permissions,name'
            ]);

            $requestData = $request->only('name');
            $permission = $this->rolePermissionService->addPermission($requestData);
            return $permission ? $this->storeTrue('permission'):$this->storeFalse('permission');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function showPermissions(Request $request)
    {
        if ($this->user->can('show permissions')):
            $permissions = $this->rolePermissionService->showPermissions($request->all());
            return PermissionResources::collection($permissions);
        else:
            return $this->unAuthorized();
        endif;
    }

    public function updatePermission(Request $request, $id)
    {
        if ($this->user->can('update permission')):
            $this->validate($request, [
                'name' => 'required|unique:permissions,name,'.$id
            ]);

            $requestData = $request->only('name');
            $permission = $this->rolePermissionService->updatePermission($requestData, $id);
            return $permission ? $this->updateTrue('permission'):$this->updateFalse('permission');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function deletePermission($id)
    {
        if ($this->user->can('delete permission')):
            $permission = $this->rolePermissionService->deletePermission($id);
            return $permission ? $this->destroyTrue('permission'):$this->destroyFalse('permission');
        else:
            return $this->unAuthorized();
        endif;
    }
}
