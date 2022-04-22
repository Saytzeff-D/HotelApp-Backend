<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedRoom extends Model
{
    protected $primaryKey = 'booked_room_id';
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'checkIn',
        'checkOut',
        'numOfGuests',
        'numOfRooms',
        'numOfNights',
        'payment_ref',
        'amount',
        'roomCategory',
        'user_id',
        'payment_status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_id',
        'updated_at'
    ];
}
