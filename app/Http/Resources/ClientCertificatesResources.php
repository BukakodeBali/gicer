<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ClientCertificatesResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'pic' => $this->pic,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'certificates' => CertificateResources::collection($this->certificates),
            'qrcode' => base64_encode(Storage::disk('local')->get('qrcode/'.$this->code.'.PNG'))
        ];
    }
}
