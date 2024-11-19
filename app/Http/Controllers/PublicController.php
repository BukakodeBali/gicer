<?php


namespace App\Http\Controllers;


use App\Http\Requests\ContactRequest;
use App\Http\Resources\CertificateClientResources;
use App\Http\Resources\ClientCertificatesResources;
use App\Mails\ContactMail;
use App\Models\Certificate;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function contact(ContactRequest $request)
    {
        if ($request->has('website') && $request->website != '') {
            return response()->json(['message' => 'Hi newbeeee :-)'], 400);
        }

        Mail::to('info@gicer.id')->send(new ContactMail($request->all()));
        return response()->json(['message' => 'Email berhasil dikirim'], 200);
    }

    public function getCertificatesByHash(Request $request)
    {
        $hash = $request->client_hash;
        $client = Client::where('client_hash', $hash)->first();
        if ($client) {
            $client = Client::with([
                'certificates' => function ($q) {
                    return $q->orderBy('id', 'desc');
                },
                'certificates.product:id,code,name,number,period',
                'certificates.status_app:id,name',
                'certificates.details' => function ($q) {
                    return $q->whereNotIn('status_id', [5]);
                },
                'certificates.details.status',
                'scope:id,name'
            ])->find($client->id);
            return new ClientCertificatesResources($client);
        }

        return $this->dataNotFound('client');
    }

    public function getCertificateByHash(Request $request)
    {
        $hash = $request->hash;
        $certificate = Certificate::where('hash', $hash)->first();
        if ($certificate) {
            $certificate = Certificate::with([
                'client',
                'details' => function ($q) {
                    return $q->whereNotIn('status_id', [5]);
                },
                'status_app',
                'product',
                'details.status',
            ])
            ->find($certificate->id);

            return new CertificateClientResources($certificate);
        }

        return $this->dataNotFound('certificate');
    }
}
