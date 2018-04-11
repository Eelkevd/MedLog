<!-- Model for user relation -->

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Traits\Encryptable;
use App\Notifications\VerifyEmail;
use App\Notifications\InviteEmail;
use App\Notifications\MailResetPasswordToken;
use Auth;
use Mail;
use DB;

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
        'username', 
        'firstname', 
        'middlename', 
        'lastname', 
        'email', 
        'password', 
        'verifyToken',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    protected $encryptable = [
        'firstname',
        'middlename',
        'lastname',
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

    public function sendInviteMailNewUser()
    {

      $this->notify(new InviteEmail($this));

    }

    // Make a reset password token and a password for a new user = reader
    // send new user = reader a welcome email with
    public static function generatePassword()
    {
      // Generate random string and encrypt it.
      return bcrypt(str_random(35));
    }

    public static function sendWelcomeEmail($user)
    {
        // Generate a new reset password token
        $token = app('auth.password.broker')->createToken($user);

        // Send email
        Mail::send('mails.welcome', ['user' => $user, 'token' => $token], function ($m) use ($user) {
        $m->from('info@medlog.com', 'MedLog');
        $m->to($user->email)->subject('Welcome to MedLog');
        });
    }

    /**
    * Returns true if the user is a reader
    *
    * @return bool
    */
    public function reader()
    {
        if(Reader::where('user_id', Auth::id())->first())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
    * Returns true if the user is a reader
    *
    * @return string
    */
    public function role()
    {
        $role = Role::findOrFail()
        ->where('user_id', Auth::id());
    }

    /**
     * Send a password reset email to the user
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));
    }

    public function diary()
    {
        return $this->hasOne('App\Diary');
    }

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function userDiaries()
    {
        return $this->belongsToMany(Diary::class, 'readers');
    }

    public function clients()
    {
        return $this->hasMany('App\Reader');
    }

    /**
    *  Define the roles of the user
    *
    * @return integer
    */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
    /**
    * Returns true if the user is a hulpverlener (reader)
    *
    * @return bool
    */
    public function hasAccess(array $permissions)
    {
        foreach($this->roles as $role){
            if($role->hasAccess($permissions)){
                return true;
            }
        }
        return false;
    }
}
