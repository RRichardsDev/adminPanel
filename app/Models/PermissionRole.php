<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_user', 'permission_role_id', 'client_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'client_user', 'permission_role_id', 'user_id');
    }
}
