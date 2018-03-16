<?php

namespace App;
use DB;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'firstname', 'middlename', 'lastname', 'bsn', 'street',
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

    use Traits\Encryptable;

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
}
