<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function account(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('pages.accountSettings.account');
    }

    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function accountAddresses(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('pages.accountSettings.accountAddresses');
    }

    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function accountPassword(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('pages.accountSettings.accountPassword');
    }

    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function accountOrders(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $authUserId = auth()->user()->id;
        $orders = Order::query()->where('user_id', '=', $authUserId)->paginate(5);


        return view('pages.accountSettings.accountOrders', compact('orders'));
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        if (count($this->get()) > 0) return false;

        return true;
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('page.login');
    }
}
