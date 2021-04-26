<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
    	'name',
    	'description',
    ];
        
    public function users()
    {
        return $this->belongsToMany(User::class, 'client_user',);
    }
    public function permission_roles()
    {
        return $this->belongsToMany(PermissionRole::class,);
    }

    public function permissions()
    {
    	return $this->belongsToMany(Permission::class, 'permission_roles', 'role_id', 'permission_id');
    }

    // public function permission_roles()
    // {
    //     return $this->belongsToMany(PermissionRole::class, 'client_user', 'user_id', 'permission_roles_id');
    // }


}
