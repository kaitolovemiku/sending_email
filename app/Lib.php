<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lib extends Model
{
    protected $fillable = ['receiver_email' , 'receiver_name' , 'sender_email' ,'appointment_date','appointment_room', 'sender_name', 'subject' , 'content'];
}
