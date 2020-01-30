<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DriverToProject extends Model
{
    use SoftDeletes;
    public function project()
    {
        return $this->belongsTo(\App\Project::class, 'project_id');
    }

    public function driver()
    {
        return $this->belongsTo(\App\Driver::class, 'driver_id');
    }

    public function car()
    {
        return $this->belongsTo(\App\Car::class, 'car_id');
    }

    public function transferista()
    {
        return $this->belongsTo(\App\User::class, 'transferista_id');
    }

}
