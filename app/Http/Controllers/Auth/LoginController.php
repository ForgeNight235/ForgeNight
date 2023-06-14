<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateUserRequest;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(LoginUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        if (auth()->attempt($validated, $request->input('remember'))) {
            $user = auth()->user();
            $rememberToken = Str::random(60);
            $user->update([
                'remember_token' => $rememberToken
            ]);
            return redirect()->route('account.account')
                ->withCookie(cookie('remember_token', $rememberToken, 10080)); //1 week
        }
        return back()
            ->withErrors(['invalid' => 'Неверное введенные данные'])
            ->withInput($request->except(['password']));
    }


}
