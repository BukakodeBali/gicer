<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ClientDetailResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'ecode' => $this->ecode,
            'nace_code' => $this->nace_code,
            'password' => $this->password,
            'pic' => $this->pic,
            'scope_id' => $this->whenLoaded('scope')->id,
            'scope_name' => $this->whenLoaded('scope')->name,
            'scope_desciption' => $this->whenLoaded('scope')->description,
            'qrcode' => base64_encode(Storage::disk('local')->get('qrcode/'.$this->code.'.PNG'))
        ];
    }
}
