<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContourInstance;

class ContourUser extends Model
{
    
	protected $fillable = [
        'name',
        'email',
        'phone',
    ];

}
