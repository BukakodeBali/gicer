<?php


namespace App\Http\Controllers;


use App\Http\Requests\ScopeStoreRequest;
use App\Http\Requests\ScopeUpdateRequest;
use App\Http\Resources\ScopeResources;
use App\Models\Scope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScopeController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function index(Request $request)
    {
        if ($this->user->can('show scope')):
            $keyword = $request->keyword;

            $perPage = $request->per_page;

            $scopes = Scope::when($keyword <> '', function ($q) use ($keyword) {
                return $q->where('code', 'like', "%{$keyword}%")
                    ->orWhere('name', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%");
            })->orderBy('id', 'desc');

            $scopes = $perPage == 'all' ? $scopes->get() : $scopes->paginate($perPage);

            return ScopeResources::collection($scopes);
        else:
            return $this->unAuthorized();
        endif;
    }

    /**
     * Store a newly scope.
     * @param ScopeStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ScopeStoreRequest $request)
    {
        if ($this->user->can('create scope')):
            $data   = $request->all();

            $scope  = Scope::create($data);

            return $scope ? $this->storeTrue('scope') : $this->storeFalse('scope');
        else:
            return $this->unAuthorized();
        endif;
    }

    /**
     * Get specific scope by scope id
     * @param $id
     * @return ScopeResources|\Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        if ($this->user->can('edit scope')):
            $scope = Scope::find($id);

            if ($scope) {
                return new ScopeResources($scope);
            }

            return $this->dataNotFound('scope');
        else:
            return $this->unAuthorized();
        endif;
    }

    /**
     * Update scope data
     * @param ScopeUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ScopeUpdateRequest $request, $id)
    {
        if ($this->user->can('update scope')):
            $scope = Scope::find($id);

            if ($scope) {
                $data = $request->all();
                $scope->update($data);
                return $this->updateTrue('scope');
            }

            return $this->dataNotFound('scope');
        else:
            return $this->unAuthorized();
        endif;
    }

    /**
     * Destroy scope by id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if ($this->user->can('delete scope')):
            $scope = Scope::find($id);

            if ($scope) {
                if ($scope->delete()) {
                    return $this->destroyTrue('scope');
                } else {
                    return $this->destroyFalse('scope');
                }
            }

            return $this->dataNotFound('scope');
        else:
            return $this->unAuthorized();
        endif;
    }
}
