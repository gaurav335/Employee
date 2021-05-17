<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class Employee extends Authenticatable
{
    protected $guard = 'api';
    protected $table ="employees";
    
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'f_name',
        'l_name',
        'dob',
        'mobile_no',	
        'email',	
        'gender',
        'password',		
        'salary',	
        'joining_date',	
        'image',	
        'passport_doc',	
        'passport_num',	
        'department',	
        'designation'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getImageAttribute($value)
    {
        return $value ? asset('storage/EmployeeImage'.'/'.$value) : NULL;
    }

    public function getPassportDocAttribute($value)
    {
        return $value ? asset('storage/EmployeePassportdocument'.'/'.$value) : NULL;
    }

    public function designation_data()
    {
        return $this->hasOne(Designation::class,'id','designation')->select('id','name');
    }

    public function department_data()
    {
        return $this->hasOne(Department::class,'id','department')->select('id','name');
    }
}
