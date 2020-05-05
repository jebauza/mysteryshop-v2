<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprises extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address'
    ];
}
