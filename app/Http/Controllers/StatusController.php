<?php


namespace App\Http\Controllers;


use App\Http\Requests\StatusStoreRequest;
use App\Http\Requests\StatusUpdateRequest;
use App\Http\Resources\StatusResources;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $perPage = $request->per_page;
        $status = Status::when($keyword <> '', function ($q) use ($keyword){
            return $q->where('name', 'like', $keyword)
                ->orWhere('period', 'like', $keyword);
        });

        $status = $perPage == 'all' ? $status->get():$status->paginate($perPage);
        return StatusResources::collection($status);
    }

    public function store(StatusStoreRequest $request)
    {
        $data = $request->all();

        $status = Status::create($data);

        return $status ? $this->storeTrue('status') : $this->storeFalse('status');
    }

    public function edit($id)
    {
        $status = Status::find($id);

        if ($status) {
            return response()->json(['data' => $status->toArray()], 200);
        }

        return $this->dataNotFound('status');
    }

    public function update(StatusUpdateRequest $request, $id)
    {
        $status = Status::find($id);

        if ($status) {
            $data = $request->all();

            return $status->update($data) ? $this->updateTrue('status') : $this->updateFalse('status');
        }

        return $this->dataNotFound('status');
    }

    public function destroy($id)
    {
        $status = Status::find($id);

        if ($status) {
            return $status->delete() ? $this->destroyTrue('status') : $this->destroyFalse('status');
        }

        return $this->dataNotFound('status');
    }
}
