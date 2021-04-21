<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instance_user_role_pivot extends Model
{
    use HasFactory;

    protected $fillable = [
        'instance_id',
        'user_id',
        'role_id',
    ];
}
