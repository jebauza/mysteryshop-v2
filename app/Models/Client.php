<?php

namespace App\Models;

use App\Models\Enterprise;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['name','address','contract_number','enterprise_id'];

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class, 'enterprise_id', 'id');
    }

    public function establishments()
    {
        return $this->hasMany(Establishment::class);
    }

}
