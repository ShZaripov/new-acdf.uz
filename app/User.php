<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRoleNameAttribute()
    {
        $role = $this->roles->first();
        if ($role) {
            $name = $role->display_name;
            if (!$name) {
                $name = $role->name;
            }
            return $name;
        }
        return false;
    }
    public function getRoleIdAttribute()
    {
        $role = $this->roles->first();
        if ($role) {
            return $role->id;
        }
        return false;
    }

}
