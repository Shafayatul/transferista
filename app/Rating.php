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

    public function user()
    {
        return $this->belongsTo(User::class, 'company_or_customer_id');
    }

    public function transferista()
    {
        return $this->belongsTo(User::class, 'transferista_id');
    }
}
