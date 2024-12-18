<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $table = 'student'; // Ensure this matches your database table name

    protected $fillable = [
        'fname',
        'image',
        'email',
        'contact',
        'course',
        'gender',
        'address',
        'hobbies',
        'password',
    ];
    // protected $casts = [
    //     'hobbies' => 'array',
    // ];
    
}
