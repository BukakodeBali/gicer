<?php


namespace App\Http\Controllers;


use App\Http\Requests\StatusStoreRequest;
use App\Http\Requests\StatusUpdateRequest;
use App\Http\Resources\StatusResources;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function index(Request $request)
    {
        if ($this->user->can('show status')):
            $keyword = $request->keyword;
            $perPage = $request->per_page;
            $status = Status::when($keyword <> '', function ($q) use ($keyword){
                return $q->where('name', 'like', $keyword)
                    ->orWhere('period', 'like', $keyword);
            });

            $status = $perPage == 'all' ? $status->get():$status->paginate($perPage);
            return StatusResources::collection($status);
        else:
            return $this->unAuthorized();
        endif;
    }

    public function store(StatusStoreRequest $request)
    {
        if ($this->user->can('create status')):
            $data = $request->all();

            $status = Status::create($data);

            return $status ? $this->storeTrue('status') : $this->storeFalse('status');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function edit($id)
    {
        if ($this->user->can('edit status')):
            $status = Status::find($id);

            if ($status) {
                return response()->json(['data' => $status->toArray()], 200);
            }

            return $this->dataNotFound('status');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function update(StatusUpdateRequest $request, $id)
    {
        if ($this->user->can('update status')):
            $status = Status::find($id);

            if ($status) {
                $data = $request->all();

                return $status->update($data) ? $this->updateTrue('status') : $this->updateFalse('status');
            }

            return $this->dataNotFound('status');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function destroy($id)
    {
        if ($this->user->can('delete status')):
            $status = Status::find($id);

            if ($status) {
                return $status->delete() ? $this->destroyTrue('status') : $this->destroyFalse('status');
            }

            return $this->dataNotFound('status');
        else:
            return $this->unAuthorized();
        endif;
    }
}
