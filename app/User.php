<?php

namespace App;

use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Encryptable;

class User extends Authenticatable
{
    use Notifiable;
    use Encryptable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'username', 'firstname', 'middlename', 'lastname', 'bsn', 'street',
        'housenumber', 'housenumbersuffix', 'town', 'postalcode', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $encryptable = [
        'firstname',
        'middlename',
        'lastname',
        'street',
        'housenumber',
        'housenumbersuffix',
        'town',
        'postalcode',
    ];

    public function entries()
    {
      return $this->hasMany(Entry::class);
    }

    public function illnesses()
    {
      return $this->hasMany(Illness::class);
    }

    public function symptomes()
    {
      return $this->hasMany(Symptom::class);
    }
}
