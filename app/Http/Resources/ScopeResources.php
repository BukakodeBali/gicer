<?php


namespace App\Http\Resources;


use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ScopeResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
