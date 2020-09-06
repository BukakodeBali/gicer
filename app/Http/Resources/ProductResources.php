<?php


namespace App\Http\Resources;


use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'period' => $this->period,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
