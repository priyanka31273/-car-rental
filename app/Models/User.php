<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Rental;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 🔹 Check if user is admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // 🔹 Check if user is customer
    public function isCustomer(): bool
    {
        return $this->role === 'customer';
    }

    // 🔹 User has many rentals
/**
 * Get all rentals for the user.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function rentals(): HasMany
    {
        return $this->hasMany(Rental::class);
    }
}
