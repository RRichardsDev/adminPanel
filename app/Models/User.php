<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\PermissionRole;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    public function clients()
    {
        return $this->belongsToMany(Client::class)
            ->withTimestamps()
                ->withPivot(['permission_role_id']);
    }
    public function role()
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }
    public function permission_roles()
    {
        return $this->belongsToMany(PermissionRole::class, 'client_user');
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
