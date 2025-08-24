<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'book_id',
        'quantity',
        'price',
    ];

    // Quan hệ: 1 order_detail thuộc về 1 order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Quan hệ: 1 order_detail thuộc về 1 book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}