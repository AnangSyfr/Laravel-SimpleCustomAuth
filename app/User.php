<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use Notifiable;
    protected $table='Users';
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
