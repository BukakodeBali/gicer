<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CertificateExpiredResources extends JsonResource
{
    public function toArray($request)
    {
        return [
          'client_name' => $this->client->name,
          'client_code' => $this->client->code,
          'expired_date' => $this->expired
        ];
    }
}
