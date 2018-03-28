<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable[ 'name', 'slug', 'permissions' ];

    public function users()
    {
      return $this->belongsToMany(User::class, 'role_users');
    }
}
