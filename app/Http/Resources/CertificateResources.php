<?php


namespace App\Http\Resources;


use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateResources extends JsonResource
{
    public function toArray($request): array
    {
        $product = $this->resource->product;
        $client = $this->resource->client;

        Carbon::setLocale('id');
        return [
            'id'            => $this->id,
            'code'          => $this->resource->code,
            'password'      => $this->resource->password,
            'client_id'     => $client->id,
            'client_code'   => $client->code,
            'client_name'   => $client->name,
            'product_id'    => $product->id,
            'product_code'  => $product->code,
            'product_number'=> $product->number,
            'product_name'  => $product->name,
            'product_period'=> $product->period,
            'status_id'     => $this->resource->status_app->id,
            'status_name'   => $this->resource->status_app->name,
            'original_date' => $this->resource->original_date,
            'issue_date'    => $this->resource->issue_date,
            'expired'       => $this->resource->expired,
            'status'        => $this->resource->status,
            'reset_detail' => 0,
            'issue_date_name' => Carbon::parse($this->resource->issue_date)->format('d F Y'),
            'issue_date_human' => Carbon::parse($this->resource->issue_date)->diffForHumans(['parts' => 2]),
            'expired_date_name' => Carbon::parse($this->resource->expired)->format('d F Y'),
            'expired_date_human' => Carbon::parse($this->resource->expired)->diffForHumans(['parts' => 2]),
            'original_date_name' => Carbon::parse($this->resource->original_date)->format('d F Y'),
            'original_date_human' => Carbon::parse($this->resource->original_date)->diffForHumans(['parts' => 2]),
            'details'       => CertificateDetailsResources::collection($this->whenLoaded('details')),
            'e_code' => $this->resource->e_code,
            'nace_code' => $this->resource->nace_code,
            'scope_name' => $this->resource->scope_name,
            'qrcode' => $this->resource->qr_code ? base64_encode($this->resource->qr_code) : '',
            'year' => Carbon::parse($this->resource->original_date)->floatDiffInYears(Carbon::parse($this->resource->expired)),
        ];
    }
}
