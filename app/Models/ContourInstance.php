<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ContourClient;
use App\Models\ContourUser;

class ContourInstance extends Model
{
	   protected $fillable = [
        'client_id',
        'user_id',
        
    ];
	public function client() {
	    return $this->hasOne(ContourClient::class, 'id');
	}
}
