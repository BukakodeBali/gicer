<?php


namespace App\Repositories;

use App\Models\User;
use DB;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function find(Int $id)
    {
        return $this->user->find($id);
    }

    public function getUser($role)
    {
        return $this->user->select('*')->where('role',$role)->get();
    }
}
