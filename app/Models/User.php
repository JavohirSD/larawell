<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function __construct(array $attributes = [])
    {
        $this->table = config('services.custom.user_table');
        $this->fillable += [
            'username' => config('services.custom.username_field'),
            'password' => config('services.custom.password_field')
        ];
        parent::__construct($attributes);
    }

    // Set or update timestamp columns
    public $timestamps = true;


    // Set date format to save DB (U - unix timestamp)
    protected $dateFormat = 'U';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
//        'username',
//        'password',
        'auth_key'
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

    protected $attributes = [
        'auth_key' => '12345678'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime:d.m.Y H:i',
        'updated_at' => 'datetime:d.m.Y H:i'
    ];

    public function getAuthPassword()
    {
        return $this->{config('services.custom.password_field')};
    }

    public function getRememberTokenName()
    {
        return config('services.custom.remember_token');
    }




}






















