<?php


namespace App\Http\Resources;


use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FeedbackResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'client_code' => $this->client->code,
            'client_name' => $this->client->name,
            'created_at_human' => Carbon::parse($this->created_at)->diffForHumans(),
            'created_at' => Carbon::parse($this->created_at)->toDateTimeString()
        ];
    }
}
