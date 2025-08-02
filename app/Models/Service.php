<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'status', // Assuming status is a field to indicate if the service is active
    ];

    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
