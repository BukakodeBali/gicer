<?php


namespace App\Http\Resources;


use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateResources extends JsonResource
{
    public function toArray($request)
    {
        Carbon::setLocale('id');
        return [
            'id'            => $this->id,
            'code'          => 'KSM/'.$this->client->code.'/'.$this->product->code,
            'client_id'     => $this->client->id,
            'client_code'   => $this->client->code,
            'client_name'   => $this->client->name,
            'product_id'    => $this->product->id,
            'product_code'  => $this->product->code,
            'product_number'=> $this->product->number,
            'product_name'  => $this->product->name,
            'product_period'=> $this->product->period,
            'status_id'     => $this->status_app->id,
            'status_name'   => $this->status_app->name,
            'issue_date'    => $this->issue_date,
            'expired'       => $this->expired,
            'status'        => $this->status,
            'issue_date_name' => Carbon::parse($this->issue_date)->format('d F Y'),
            'issue_date_human' => Carbon::parse($this->issue_date)->diffForHumans(['parts' => 2]),
            'expired_date_name' => Carbon::parse($this->expired)->format('d F Y'),
            'expired_date_human' => Carbon::parse($this->expired)->diffForHumans(['parts' => 2]),
            'details'       => CertificateDetailsResources::collection($this->whenLoaded('details'))
        ];
    }
}
