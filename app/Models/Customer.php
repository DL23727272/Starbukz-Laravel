<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'password', 'email', 'type', 'phone_number', 'address', // Add other fillable fields as needed
    ];

    // Define relationship with orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
