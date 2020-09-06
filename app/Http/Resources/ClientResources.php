<?php


namespace App\Http\Resources;


use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'code'      => $this->code,
            'phone'     => $this->phone,
            'email'     => $this->email,
            'password'  => $this->password,
            'ecode'     => $this->ecode,
            'pic'       => $this->pic,
            'scope_id'  => $this->whenLoaded('scope')->id,
            'scope_name'=> $this->whenLoaded('scope')->name,
            'created_at'=> Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
