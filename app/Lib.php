<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lib extends Model
{
    protected $fillable = [
        'receiver_name',
        'receiver_email',
        'sender_name',
        'sender_email',
        'subject',
        'message',
        'appointment_date',
        'appointment_room',
        'status',
        'token',
    ];
}
