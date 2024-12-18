<?php


namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserDetailResources;
use App\Http\Resources\UserResources;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userRepository;
    public $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($this->user->can('show users')):
            $keyword    = $request->input('keyword') ?? '';
            $perPage    = $request->input('per_page') ?? 10;
            $listUser   = User::with('roles')
                ->when($keyword <> '', function($q) use ($keyword) {
                    $q->where('email', 'like', "%{$keyword}%")
                        ->orWhere('username', 'like', "%{$keyword}%")
                        ->orWhereHas('roles', function ($q) use ($keyword) {
                            $q->where('name', 'like', "%{$keyword}%");
                        });
                })
                ->orderBy('id', 'desc');

            $listUser = $perPage === 'all' ? $listUser->get():$listUser->paginate($perPage);

            if ($listUser) {
                return UserResources::collection($listUser);
            }

            return $this->dataEmpty('User');
        else:
            return $this->unAuthorized();
        endif;
    }

    /**
     * Store new user to storage
     * @param UserStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserStoreRequest $request)
    {
        if ($this->user->can('create user')):
            $data = $request->except(['password_confirmation', 'role']);

            $data['password'] = app('hash')->make($data['password']);

            $user = User::create($data);

            $user->assignRole($request->role);

            return $user ? $this->storeTrue('user'):$this->storeFalse('user');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function edit($id)
    {
        if ($this->user->can('edit user')):
            $user = User::find($id);
            if ($user) {
                return new UserDetailResources($user);
            }

            return $this->dataNotFound('user');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function update(UserUpdateRequest $request, $id)
    {
        if ($this->user->can('update user')):
            $user = User::find($id);

            if ($user) {
                $password   = $request->password;

                $data       = $request->except(['password', 'password_confirmation', 'id', 'role', 'created_at']);

                if ($password != '' && $password != null) {
                    $data['password'] = app('hash')->make($password);
                }

                $user->assignRole($request->role);

                return $user->update($data) ? $this->updateTrue('user') : $this->updateFalse('user');
            }

            return $this->dataNotFound('user');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function destroy($id)
    {
        if ($this->user->can('delete user')):
            $user = User::find($id);

            if ($user) {
                return $user->delete() ? $this->destroyTrue('pengguna') : $this->destroyFalse('pengguna');
            }

            return $this->dataNotFound('user');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function me()
    {
        $user = request()->user();
        return response()->json(['data' => $user], 200);
    }
}
