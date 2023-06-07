<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

//    Получение все продуктов
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    // Отношение с пользователем
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Отношение с доставкой
    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }

//    Получение красивой цены
    public function price()
    {
        return number_format($this->total, 0, ',', ' ') . ' ₱';
    }

    public function priceWithDelivery()
    {
        return number_format($this->total + $this->delivery->price, 0, ',' , ' ') . ' ₱';
    }

    public function totalOrderPrice()
    {
        $totalPrice = 0;

        foreach ($this->products as $orderProduct) {
            $totalPrice += $orderProduct->quantity * $orderProduct->product->price;
        }

        $totalPrice += 350;

        return number_format($totalPrice, 0, ',', ' ') . ' ₱';
    }
}
