<?php

namespace App;

use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Traits\Encryptable;
use App\Notifications\VerifyEmail;
use App\Notifications\MailResetPasswordToken;

class User extends Authenticatable implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Notifiable;
    use Encryptable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'firstname', 'middlename', 'lastname', 'bsn', 'street',
        'housenumber', 'housenumbersuffix', 'town', 'postalcode', 'email', 'password', 'verifyToken',
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

    /**
    * Returns true if the user is verified
    *
    * @return bool
    */
    public function verified()
    {
      return $this->verifyToken === null;
    }

    /**
    * send the user a verification email
    *
    * @return void
    */
    public function sendVerificationMail()
    {

      $this->notify(new VerifyEmail($this));

    }

    /**
     * Send a password reset email to the user
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));
    }



}
