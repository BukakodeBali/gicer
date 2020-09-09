<?php


namespace App\Repositories;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionRepository
{
    protected $role;
    protected $permission;
    protected $guard;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function showRoles(String $keyword)
    {
        return $this->role->when($keyword <> '', function ($q) use ($keyword) {
            $q->where('name', 'like', "%{$keyword}%");
        })->orderBy('id', 'desc')->get();
    }

    public function addRoleWithPermissions(Array $role, Array $permissions)
    {
        $role = $this->role->create($role);
        return $this->updateRole(['permissions' => $permissions, 'name' => $role->name], $role->id);
    }

    public function getRoleById(Int $id)
    {
        return $this->role->find($id);
    }

    public function getRoleWithPermissionsById(Int $id)
    {
        return $this->role->with('permissions')->find($id);
    }

    public function updateRole(Array $data, Int $id)
    {
        $role = $this->role->find($id);
        $role->update(['name' => $data['name']]);
        return $role->syncPermissions($data['permissions']);
    }

    public function deleteRole(Int $id)
    {
        return $this->getRoleById($id)->delete();
    }

    public function showPermissions($perPage, String $keyword)
    {
        $permissions =  $this->permission->when($keyword <> '', function ($q) use ($keyword) {
            $q->where('name', 'like', "%{$keyword}%");
        })->orderBy('id', 'desc');

        return $perPage == 'all' ? $permissions->get():$permissions->paginate($perPage);
    }

    public function addPermission(Array $data)
    {
        return $this->permission->create($data);
    }

    public function getPermissionById(Int $id)
    {
        return $this->permission->find($id);
    }

    public function updatePermission(Array $data, $id)
    {
        $permission = $this->getPermissionById($id);
        return $permission->update($data);
    }

    public function deletePermission(Int $id)
    {
        $permission = $this->getPermissionById($id);
        return $permission->delete();
    }
}
