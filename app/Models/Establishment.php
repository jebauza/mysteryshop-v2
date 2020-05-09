<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    protected $fillable = [
        'name', 'address', 'establishment_type_id', 'client_id'
    ];

    public function establishmentType()
    {
        return $this->belongsTo(EstablishmentType::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
