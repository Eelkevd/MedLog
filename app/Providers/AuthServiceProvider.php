<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerReadPolicies();
        //
    }

    /**
     * define the role
     *
     * @return bool
     */
    public function registerReadPolicies()
    {
      Gate::define('read-diary', function($user){
        return $user->inRole(['hulpverlener']);
      });

      Gate::define('create-diary', function($user){
        return $user->hasAccess(['create-diary']);
      });

      Gate::define('create_entry', function($user){
        return $user->hasAccess(['create_entry']);
      });

      Gate::define('update_entry', function($user, \App\Entry $entry ){
        return $user->hasAccess(['update_entry']) or $user->id == $entry->user_id;
      });

      Gate::define('create-medicine', function($user){
        return $user->hasAccess(['create-medicine']);
      });

      Gate::define('update-medicine', function($user, \App\Medicine $medicine){
        return $user->hasAccess(['update-medicine']) or $user->id == $medicine->user_id;
      });

      Gate::define('create-tool', function($user){
        return $user->hasAccess(['create-tool']);
      });

      Gate::define('update-tool', function($user, \App\Tool $tool){
        return $user->hasAccess(['update-tool']) or $user->id == $tool->user_id;
      });

      Gate::define('create-event', function($user){
        return $user->hasAccess(['create-event']);
      });

      Gate::define('update-event', function($user, \App\Event $event){
        return $user->hasAccess(['update-event']) or $user->id == $event->user_id;
      });
    }
}
