<?php


namespace App\Http\Resources;


use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateDetailsResources extends JsonResource
{
    public function toArray($request)
    {
        Carbon::setLocale('id');
        return [
            'id' => $this->id,
            'status_id' => $this->status_id,
            'status_name' => $this->whenLoaded('status')->name,
            'issue_date' => $this->issue_date,
            'active' => $this->is_active,
            'issue_date_name' => Carbon::parse($this->issue_date)->format('d F Y'),
            'issue_date_human' => Carbon::parse($this->issue_date)->diffForHumans(['parts' => 3])
        ];
    }
}
