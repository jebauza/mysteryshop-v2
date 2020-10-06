<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndicatorGroup extends Model
{
    protected $table = 'indicator_groups';

    protected $fillable = ['name','description'];
}
