<?php

namespace App\Models;

use App\Models\Establishment;
use App\Models\DepartmentEvaluation;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = ['name','establishment_id'];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class, 'establishment_id', 'id');
    }

    public function departmentEvaluations()
    {
        return $this->hasMany(DepartmentEvaluation::class, 'department_id', 'id');
    }
}
