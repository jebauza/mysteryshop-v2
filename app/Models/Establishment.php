<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Department;
use App\Models\EstablishmentType;
use App\Models\EstablishmentEvaluation;
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

    public function departments()
    {
        return $this->hasMany(Department::class, 'establishment_id', 'id');
    }

    public function evaluations()
    {
        return $this->hasMany(EstablishmentEvaluation::class, 'establishment_id', 'id');
    }
}
