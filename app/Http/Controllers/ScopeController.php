<?php


namespace App\Http\Controllers;


use App\Http\Requests\ScopeStoreRequest;
use App\Http\Requests\ScopeUpdateRequest;
use App\Http\Resources\ScopeResources;
use App\Models\Scope;
use Illuminate\Http\Request;

class ScopeController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $perPage = $request->per_page;

        $scopes = Scope::when($keyword <> '', function ($q) use ($keyword) {
            return $q->where('code', 'like', "%{$keyword}%")
                ->orWhere('name', 'like', "%{$keyword}%")
                ->orWhere('description', 'like', "%{$keyword}%");
        })->orderBy('id', 'desc');

        $scopes = $perPage == 'all' ? $scopes->get() : $scopes->paginate(10);

        return ScopeResources::collection($scopes);
    }

    /**
     * Store a newly scope.
     * @param ScopeStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ScopeStoreRequest $request)
    {
        $data   = $request->all();

        $scope  = Scope::create($data);

        return $scope ? $this->storeTrue('scope') : $this->storeFalse('scope');
    }

    /**
     * Get specific scope by scope id
     * @param $id
     * @return ScopeResources|\Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $scope = Scope::find($id);

        if ($scope) {
            return new ScopeResources($scope);
        }

        return $this->dataNotFound('scope');
    }

    /**
     * Update scope data
     * @param ScopeUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ScopeUpdateRequest $request, $id)
    {
        $scope = Scope::find($id);

        if ($scope) {
            $data = $request->all();
            $scope->update($data);
            return $this->updateTrue('scope');
        }

        return $this->dataNotFound('scope');
    }

    /**
     * Destroy scope by id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $scope = Scope::find($id);

        if ($scope) {
            if ($scope->delete()) {
                return $this->destroyTrue('scope');
            } else {
                return $this->destroyFalse('scope');
            }
        }

        return $this->dataNotFound('scope');
    }
}
