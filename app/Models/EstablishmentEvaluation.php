<?php

namespace App\Models;

use App\User;
use App\Models\Establishment;
use Illuminate\Database\Eloquent\Model;

class EstablishmentEvaluation extends Model
{
    protected $table = 'establishment_evaluations';

    protected $fillable = ['date','time','comment','employee_name','establishment_id','user_id'];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class, 'establishment_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
