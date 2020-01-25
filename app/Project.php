<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Bid;

class Project extends Model
{
    use SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class, 'project_id');
    }
}
