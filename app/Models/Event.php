<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    //
    use HasFactory, Notifiable;

    protected $fillable = [
        'event_name',
        'event_type',
        'event_venue',
        'event_date',
        'morning_in_start',
        'morning_in_end',
        'morning_out_start',
        'morning_out_end',
        'afternoon_in_start',
        'afternoon_in_end',
        'afternoon_out_start',
        'afternoon_out_end',
        'user_id'
    ];

}
