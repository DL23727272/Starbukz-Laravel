<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 'total_price', 'status', 
    ];

    // Define relationship with customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Define relationship with order items
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
