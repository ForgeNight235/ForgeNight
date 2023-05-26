<?php

namespace App\Models;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function toggleOrderStatus(Request $request, Order $order)
    {
        $order->update([
            'status' => $request->get('status')
        ]);

        return back();
    }
}
