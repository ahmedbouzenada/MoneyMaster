<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Debt extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'description',
        'date',
        'client_id',
        'reference_number',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
