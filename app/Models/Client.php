<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Client extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name'
    ];

    public function users()
    {
    	return $this->belongsToMany(User::class)
                        ->withTimestamps()
                            ->withPivot(['permission_role_id']);                        
    }
    public function roles()
    {
        return $this->belongsToMany(PermissionRole::class, 'permission_roles', 'client_id', 'role_id');
    }




}
