<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = [
        'order_number',
        'first_name',
        'last_name',
        'email',
        'phone',
        'shipping_method',
        'department',
        'province',
        'district',
        'address',
        'reference',
        'subtotal',
        'shipping_cost',
        'total',
        'status',
        'pdf'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
