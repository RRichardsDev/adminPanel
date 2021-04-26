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
    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
