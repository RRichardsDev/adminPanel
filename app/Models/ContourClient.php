<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContourClient extends Model
{
   protected $fillable = [
        'name',
        'email',
        'phone',
        'address_1',
        'address_2',
        'address_postcode'
    ];

    public function ContourInstance()
    {
        return $this->hasOne(ContourClient::class);
    }
}