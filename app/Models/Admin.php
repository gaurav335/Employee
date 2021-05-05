<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    protected $guard = 'admin';
    protected  $table='admin';

    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
