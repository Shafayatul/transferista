<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Project;

class Rating extends Model
{
    use SoftDeletes;

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function ratingFrom()
    {
        return $this->belongsTo(User::class, 'rating_from');
    }

    public function ratingTo()
    {
        return $this->belongsTo(User::class, 'rating_to');
    }
}
