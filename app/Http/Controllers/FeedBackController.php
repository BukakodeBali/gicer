<?php


namespace App\Http\Controllers;


use App\Http\Requests\FeedbackStoreRequest;
use App\Http\Resources\FeedbackResources;
use App\Models\Feedback;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedBackController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $perPage = $request->per_page;

        $data = Feedback::with('client')
            ->when($keyword <> '', function ($q) use ($keyword) {
                $q->where('feedback', 'like', "%{$keyword}%")
                    ->orWhereHas('client', function ($q) use ($keyword){
                        $q->where('code', 'like', "%{$keyword}%")
                            ->orWhere('name', 'like', "%{$keyword}%");
                    });
            })->orderBy('id', 'desc');

        $data = $perPage == 'all' ? $data->get() : $data->paginate($perPage);
        return FeedbackResources::collection($data);
    }

    public function store(FeedbackStoreRequest $request)
    {
        $id     = Auth::id();
        $client = Client::where('user_id', $id)->first();

        if ($client) {
            $data = [
                'feedback' => $request->feedback,
                'client_id' => $client->id
            ];

            return Feedback::create($data) ? $this->storeTrue('feedback'):$this->storeFalse('feedback');
        }

        return $this->dataNotFound('client');
    }

    public function destroy($id)
    {
        $feedback = Feedback::find($id);

        if ($feedback) {
            return $feedback->delete() ? $this->destroyTrue('feedback') : $this->destroyFalse('feedback');
        }

        return $this->dataNotFound('feedback');
    }
}
