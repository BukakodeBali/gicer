<?php


namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResources;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword    = $request->input('keyword') ?? '';
        $perPage    = $request->input('per_page') ?? 10;
        $listUser   = User::with('roles')->when($keyword <> '', function($q) use ($keyword) {
            $q->where('email', 'like', "%{$keyword}%")
                ->orWhere('username', 'like', "%{$keyword}%");
        })->orderBy('id', 'desc');

        $listUser = $perPage === 'all' ? $listUser->get():$listUser->paginate($perPage);

        if ($listUser) {
            return UserResources::collection($listUser);
        }

        return $this->dataEmpty('User');
    }

    /**
     * Store new user to storage
     * @param UserStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserStoreRequest $request)
    {
        $data = $request->except(['password_confirmation', 'roles']);

        $data['password'] = app('hash')->make($data['password']);

        $user = User::create($data);

        $user->assignRole($request->roles);

        return $user ? $this->storeTrue('user'):$this->storeFalse('user');
    }

    public function me()
    {
        $user = request()->user();
        return response()->json(['data' => $user], 200);
    }
}
