<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserInformation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_informations';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
