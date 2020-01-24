<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    use SoftDeletes;
}
