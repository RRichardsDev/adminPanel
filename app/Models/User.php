<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\PermissionRole;
use App\Models\ClientUserRole;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function client()
    {
        return $this->belongsToMany(Client::class)
                ->withPivot(['permission_role_id']);                        

    }
    public function permission_roles()
    {
        return $this->belongsToMany(PermissionRole::class, 'client_user', 'user_id', 'permission_role_id');
    }
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
