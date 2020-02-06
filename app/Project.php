<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Bid;
use App\Rating;

class Project extends Model
{
    use SoftDeletes;

    /**
     * Status
     * 0 = available
     * 1 = accepted
     * 2 = on_going
     * 3 = delivered
     * 4 = deleted
     */

    public function status(){
        return $status = [
            'available' => '0',
            'accepted'  => '1',
            'on_going'  => '2',
            'delivered' => '3',
            'deleted'    => '4'
        ];
    }


    public function user(){
        return $this->belongsTo(User::class,'project_owner_id');
    }

    public function transferista()
    {
        return $this->belongsTo(User::class, 'transferista_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class, 'project_id');
    }

    public function rating()
    {
        return $this->hasOne(Rating::class, 'project_id');
    }

    public function driverToProject()
    {
        return $this->hasOne(\App\DriverToProject::class, 'project_id');
    }

    public function invoice()
    {
        return $this->hasOne(\App\Invoice::class, 'project_id');
    }
}
