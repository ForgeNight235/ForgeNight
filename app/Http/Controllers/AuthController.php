<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\CreateUserRequest;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\UpdateAddressRequest;
use App\Http\Requests\Auth\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class AuthController extends Controller
{
    public function createUser(CreateUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = User::query()->create($validated);

        /** @var User $user */
        auth()->login($user);

        return redirect()->route('page.catalog');
    }

    public function loginUser(LoginUserRequest $request): RedirectResponse
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

    public function logoutUser(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('page.home');
    }

    public function updateUser(UpdateRequest $request, User $user)
    {
        $validated = $request->validated();

        if ($request->hasFile('avatar'))
        {
            $validated['avatar'] = $request->file('avatar')->store('public/users-avatars');
        }
//      dd($user);
        $user = auth()->user();
//        $user->newsSubscription = $request->has('newsSubscription');
//        dd($validated);
        $user->save();

        $user->update($validated);
//        dd($validated);
//        return redirect()
//            ->route('account.account');
        return back();
    }
    public function updateUserAddress(UpdateAddressRequest $request, User $user)
    {
        $validated = $request->validated();
//        dd($validated);
        $user= auth()->user();
        $user->update($validated);

//        return redirect()
//            ->route('account.accountAddresses');
        return back();
    }
}
