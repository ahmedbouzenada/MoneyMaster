<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'name' => $this->firstname . ' ' . $this->lastname,
            'email' => $this->email,
            'birth_date' => $this->birthdate,
            'phone' => $this->phone_number,
            'balance' => $this->balance,
            'payments' => $this->payments,
            'debts' => $this->debts
        ];
    }
}
