<?php


namespace App\Http\Resources;


use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class StatusResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'period' => $this->period,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
