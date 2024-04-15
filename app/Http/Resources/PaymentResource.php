<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'client_id' => $this->client->id,
            'client' => $this->client->firstname . ' ' . $this->client->lastname,
            'reference_number' => $this->reference_number,
            'amount' => $this->amount,
            'payment_method' => $this->payment_method,
            'date' => $this->date,
        ];
    }
}
