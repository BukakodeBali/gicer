<?php


namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Http\Resources\ClientCertificatesResources;
use App\Http\Resources\ClientDetailResources;
use App\Http\Resources\ClientResources;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use LaravelQRCode\Facades\QRCode;


class ClientController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $perPage = $request->per_page;

        $clients = Client::with('scope')->when($keyword <> '', function ($q) use ($keyword) {
            return $q->where('name', 'like', "%{$keyword}%")
                        ->orWhere('code', 'like', "%{$keyword}%")
                        ->orWhere('phone', 'like', "%{$keyword}%")
                        ->orWhere('email', 'like', "%{$keyword}%")
                        ->orWhere('pic', 'like', "%$keyword%");
        })->orderBy('id', 'desc');

        $clients = $perPage == 'all' ? $clients->get():$clients->paginate($perPage);

        return ClientResources::collection($clients);
    }

    /**
     * Store a newly client.
     * @param ClientStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ClientStoreRequest $request)
    {
        $data = $request->all();

        $password = Str::random(8);

        $user = [
            'username'  => $data['code'],
            'email'     => $data['email'],
            'password'  => app('hash')->make($password),
        ];

        $data['password'] = $password;

        $qrcode     = $data['code'].Str::random(10);

        $qrcode     = app('hash')->make($qrcode);

        $data['client_hash'] = $qrcode;

        $storagePath= Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();

        $filename   = $data['code'].'.PNG';

        $filepath   = $storagePath.'qrcode/'.$filename;

        $qrurl      = env('APP_CLIENT_URL').'/verify/'.$qrcode;

        QRCode::url($qrurl)->setOutfile($filepath)->setSize(8)->setMargin(2)->setErrorCorrectionLevel('H')->png();

        DB::beginTransaction();
        try {
            $client = new Client($data);
            $user   = User::create($user);
            $user->client()->save($client);
            $user->assignRole('Client');
            DB::commit();
            return $this->storeTrue('perusahaan');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->storeFalse('perusahaan');
        }
    }

    /**
     * Get specific client by client id
     * @param $id
     * @return ClientDetailResources|\Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $client = Client::with('scope')->find($id);

        if ($client) {
            return new ClientDetailResources($client);
        }

        return $this->dataNotFound('perusahaan');
    }

    /**
     * Update client
     * @param ClientUpdateRequest $request
     * @param $id
     * @return ClientDetailResources|\Illuminate\Http\JsonResponse
     */
    public function update(ClientUpdateRequest $request, $id)
    {
        $client = Client::find($id);

        if ($client) {
            $user = $client->user;
            $data = $request->all();

            if ($client['password'] != $data['password'] ) {
                $user->password = app('hash')->make($data['password']);
            }

            if ($client['code'] != $data['code']) {
                Storage::disk('local')->move("qrcode/{$client['code']}.PNG", "qrcode/{$data['code']}.PNG");
            }

            $user->username = $data['code'];

            $user->email = $data['email'];

            $user->save();

            $user->assignRole('Client');

            $client->update($data);

            return $this->updateTrue('perusahaan');
        }

        return $this->dataNotFound('perusahaan');
    }

    public function destroy($id)
    {
        $client = Client::find($id);

        if ($client) {
            try {
                DB::beginTransaction();
                User::find($client['user_id'])->delete();
                $client->delete();
                DB::commit();

                return $this->destroyTrue('perusahaan');
            } catch (\Exception $e) {
                DB::rollBack();
                return $this->destroyFalse('perusahaan');
            }
        }

        return $this->dataNotFound('perusahaan');
    }

    public function getDetailWithCertificates($id)
    {
        $client = Client::find($id);

        if ($client) {
            $client = Client::with([
                'certificates' => function ($q) {
                    return $q->orderBy('id', 'desc');
                },
                'certificates.product:id,code,name,number,period',
                'certificates.status_app:id,name',
                'certificates.details' => function ($q) {
                    return $q->whereNotIn('status_id', [1,5]);
                },
                'certificates.details.status',
                'scope:id,name'
            ])->find($id);
            return new ClientCertificatesResources($client);
        }

        return $this->dataNotFound('perusahaan');
    }

    public function clientCertificates()
    {
        $user   = Auth::id();
        $client = Client::where('user_id', $user)->first();

        if ($client) {
            $client = Client::with([
                'certificates' => function ($q) {
                    return $q->orderBy('id', 'desc');
                },
                'certificates.product:id,code,name,number,period',
                'certificates.status_app:id,name',
                'certificates.details' => function ($q) {
                    return $q->whereNotIn('status_id', [1,5]);
                },
                'certificates.details.status',
                'scope:id,name'
            ])->find($client->id);
            return new ClientCertificatesResources($client);
        }

        return $this->dataNotFound('perusahaan');
    }

    /**
     * Generate auto code for client
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateCode()
    {
        $client = Client::latest()->first();

        $code   = '0001';

        if ($client) {
            $clientCode = (int) $client['code'];
            $clientCode = $clientCode + 1;
            $code       = sprintf("%'.04d", $clientCode);
        }

        return response()->json(['code' => $code], 200);
    }
}
