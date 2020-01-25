<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Project;
use App\User;

class Bid extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class, 'transferista_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
