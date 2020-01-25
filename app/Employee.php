<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Employee extends Model
{
    use SoftDeletes;

    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }

    public function companyUser()
    {
        $this->belongsTo(User::class, 'company_id');
    }
}
