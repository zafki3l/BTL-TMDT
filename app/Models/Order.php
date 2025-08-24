<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'total_price'
    ];

    // 1 order có nhiều order_detail
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // 1 order thuộc về 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
