<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $table="designation";
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
