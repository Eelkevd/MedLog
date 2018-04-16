<?php

namespace App;
// Model for role relations

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;

class Role extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name',
        'slug',
        'permissions',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
    
    /**
    * Returns true if the user is a hulpverlener (reader)
    *
    * @return bool
    */
    public function hasAccess(array $permissions)
    {
        foreach($permissions as $permission){
            if($this->hasPermission($permission))
            {
                return true;
            }
        }
        return false;
    }

    protected function hasPermission(string $permission)
    {
        $permissions = json_decode($this->permissions,true);
        return $permissions[$permission]?$permissions[$permission]:false;
    }
}
