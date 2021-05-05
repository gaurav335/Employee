<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table='department';
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
