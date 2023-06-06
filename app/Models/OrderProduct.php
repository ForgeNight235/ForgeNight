<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'order_id',
        'quantity'
    ];

    public function totalProductPrice()
    {
        return number_format($this->quantity * $this->product->price, 0, ',', ' ') . ' ₱';
    }

    public function totalProductQuantity()
    {
        return $this->where('order_id', $this->order_id)->sum('quantity');
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
