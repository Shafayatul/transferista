<?php

namespace App;
use App\Project;
use App\Message;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use App\UserInformation;
use App\Bid;
use App\Employee;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','first_name', 'last_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function project(){
        return $this->hasMany(Project::class);
    }

    public function userInfo()
    {
        return $this->hasOne(UserInformation::class, 'user_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class, 'transferista_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id');
    }

    public function companyEmployee()
    {
        return $this->hasMany(Employee::class, 'company_id');
    }

    public function ratingCompanyCustomer()
    {
        return $this->hasMany(Rating::class, 'company_or_customer_id');
    }

    public function ratingrTransaferista()
    {
        return $this->hasMany(Rating::class, 'transferista_id');
    }
}
