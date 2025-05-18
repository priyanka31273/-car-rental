<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'start_date',
        'end_date',
        'total_cost',
    ];

    // 🔹 Rental belongs to a Car
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    // 🔹 Rental belongs to a User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
