<?php


namespace App\Services;

use App\Repositories\RolePermissionRepository;

class RolePermissionService
{
    protected $rolePermissionRepository;
    protected $guard;

    public function __construct(RolePermissionRepository $rolePermissionRepository)
    {
        $this->rolePermissionRepository = $rolePermissionRepository;
        $this->guard = 'api';
    }

    public function showRoles(Array $data)
    {
        $keyword = $data['keyword'] ?? '';
        return $this->rolePermissionRepository->showRoles($keyword);
    }

    public function addRole(Array $data)
    {
        $role = [
            'name' => $data['name'],
            'guard_name' => $this->guard
        ];

        $permissions = $data['permissions'];
        return $this->rolePermissionRepository->addRoleWithPermissions($role, $permissions);
    }

    public function getRoleWithPermissionsById(Int $id)
    {
        $permission = $this->rolePermissionRepository->getRoleById($id);
        if (!$permission) {
            throw new \App\Exceptions\NotFoundException("role");
        }
        return $this->rolePermissionRepository->getRoleWithPermissionsById($id);
    }

    public function updateRole(Array $data, Int $id)
    {
        return $this->rolePermissionRepository->updateRole($data, $id);
    }

    public function deleteRole(Int $id)
    {
        $permission = $this->rolePermissionRepository->getRoleById($id);
        if (!$permission) {
            throw new \App\Exceptions\NotFoundException("role");
        }
        return $this->rolePermissionRepository->deleteRole($id);
    }

    public function addPermission(Array $data)
    {
        $data['guard_name'] = $this->guard;
        return $this->rolePermissionRepository->addPermission($data);
    }

    public function showPermissions(Array $data)
    {
        $perPage = $data['per_page'] ?? 10;
        $keyword = $data['keyword'] ?? '';
        return $this->rolePermissionRepository->showPermissions($perPage, $keyword);
    }

    public function updatePermission(Array $data, $id)
    {
        $permission = $this->rolePermissionRepository->getPermissionById($id);
        if (!$permission) {
            throw new \App\Exceptions\NotFoundException("permission");
        }

        return $this->rolePermissionRepository->updatePermission($data, $id);
    }

    public function deletePermission(Int $id)
    {
        $permission = $this->rolePermissionRepository->getPermissionById($id);
        if (!$permission) {
            throw new \App\Exceptions\NotFoundException("permission");
        }

        return $this->rolePermissionRepository->deletePermission($id);
    }
}
