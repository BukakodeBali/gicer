<?php

namespace App\Http\Resources;

use Carbon\Carbon as Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'username'      => $this->username,
            'email'         => $this->email,
            'roles'         => RoleResources::collection($this->whenLoaded('roles')),
            'created_at'    => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
