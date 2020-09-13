<?php


namespace App\Http\Resources;


use Carbon\Carbon as Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDetailResources extends JsonResource
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
            'role'          => $this->roles[0]->id ?? 1,
            'password'      => '',
            'password_confirmation' => '',
            'created_at'    => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
