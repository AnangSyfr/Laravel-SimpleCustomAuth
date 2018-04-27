<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='Admins';
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
