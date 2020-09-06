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
            'ecode' => $this->ecode,
            'nace_code' => $this->nace_code,
            'pic' => $this->pic,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'scode_id' => $this->scope_id,
            'scope_name' => $this->scope->name,
            'certificates' => CertificateResources::collection($this->certificates),
            'qrcode' => base64_encode(Storage::disk('local')->get('qrcode/'.$this->code.'.PNG'))
        ];
    }
}
