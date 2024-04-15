<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DebtResource extends JsonResource
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
            'client' => $this->client->lastname . ' ' . $this->client->firstname,
            'reference_number' => $this->reference_number,
            'amount' => $this->amount,
            'date' => $this->date,
            'description' => $this->description
        ];
    }
}
