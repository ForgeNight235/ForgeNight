<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    const IS_USER = 'user';
    const IS_ADMIN = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'surname', 'patronymic', 'login',
        'email', 'role', 'newsSubscription',
        'avatar', 'password', 'city',
        'address', 'index', 'mobile', 'birthDay'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Foundation\Application|string|UrlGenerator|Application
     */
    public function avatarUrl(): \Illuminate\Foundation\Application|string|UrlGenerator|Application
    {
        return url(Storage::url($this->avatar));
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === self::IS_ADMIN;
    }

    /**
     * @return string
     */
    public function createdDate(): string
    {
        return date('d:m:Y', strtotime($this->created_at));
    }
}
