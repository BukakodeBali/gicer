<?php


namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use \Carbon\Carbon as Carbon;

class RoleResources extends JsonResource
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
            'id'    => $this->id,
            'name'  => $this->name,
            'permissions' => PermissionResources::collection($this->whenLoaded('permissions')),
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
