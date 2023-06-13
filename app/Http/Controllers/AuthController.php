<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\CreateUserRequest;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\UpdateAddressRequest;
use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Http\Requests\Auth\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * @param CreateUserRequest $request
     * @return RedirectResponse
     */
    public function createUser(CreateUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = User::query()->create($validated);

        /** @var User $user */
        auth()->login($user);

        return redirect()->route('page.catalog');
    }

    /**
     * @param LoginUserRequest $request
     * @return RedirectResponse
     */
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

    /**
     * @return RedirectResponse
     */
    public function logoutUser(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('page.home');
    }

    /**
     * @param UpdateRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function updateUser(UpdateRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('public/users-avatars');
        }

        $user = auth()->user();

        $user->save();

        $user->update($validated);

        session()->flash('success', 'Данные успешно обновлены!');

        return back();
    }

    /**
     * @param UpdateAddressRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function updateUserAddress(UpdateAddressRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();

        $user = auth()->user();

        $user->update($validated);

        session()->flash('success', 'Адрес успешно изменен!');

        return back();
    }

    /**
     * @param UpdatePasswordRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function updatePassword(UpdatePasswordRequest $request, User $user): RedirectResponse
    {
        $user = auth()->user();

        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user->update($validated);

        session()->flash('success', 'Пароль успешно обновлен!');

        return back();
    }
}
