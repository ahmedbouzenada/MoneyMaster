<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'description',
        'date',
        'client_id',
        'payment_method',
        'reference_number',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    protected function paymentMethod(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords(str_replace('_', ' ', $value))
        );
    }

    protected function amount(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value . ' DZD'
        );
    }

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::parse($value)->format('d F Y')
        );
    }
}
