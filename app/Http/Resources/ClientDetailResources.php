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
            'password' => $this->password,
            'pic' => $this->pic,
            'qrcode' => base64_encode(Storage::disk('local')->get('qrcode/'.$this->code.'.PNG'))
        ];
    }
}
