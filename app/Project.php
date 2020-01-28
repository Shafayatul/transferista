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

    public function user(){
        return $this->belongsTo(User::class,'project_owner_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class, 'project_id');
    }

    public function rating()
    {
        return $this->hasOne(Rating::class, 'project_id');
    }
}
