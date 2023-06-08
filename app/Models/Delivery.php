<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'delivery_option_id',
        'track_code'
    ];

    public function deliveryPrice()
    {
        return number_format($this->price, 0, ',', ' ') . ' ₱';
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function deliveryOption()
    {
        return $this->belongsTo(DeliveryOption::class, 'delivery_option_id');
    }

}
