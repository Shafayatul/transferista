<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;

    public function driverAssignProject()
    {
        return $this->hasOne(\App\DriverToProject::class, 'driver_id');
    }
}
