<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function getUserPermisions(){
        $empty_permissions_array = [];
        $permissions_array = DB::table('permissions_roles')
        ->join('permissions','permissions.id','permissions_roles.permissions_id')
        ->where('roles_id',Auth::user()->role_id)
        ->select('permissions.permission')->get();
        foreach(json_decode($permissions_array,true) as $permissions){
            array_push($empty_permissions_array,$permissions["permission"]);
        }
        return $empty_permissions_array;
    }
}
