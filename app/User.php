<?php

namespace App;

use App\Models\Enterprise;
use App\Models\DepartmentEvaluation;
use App\Models\EstablishmentEvaluation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enterprise_id', 'name', 'surname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }

    public function establishmentEvaluations()
    {
        return $this->hasMany(EstablishmentEvaluation::class, 'user_id', 'id');
    }

    public function departmentEvaluations()
    {
        return $this->hasMany(DepartmentEvaluation::class, 'user_id', 'id');
    }
}
