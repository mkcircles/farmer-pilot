<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'age',
        'gender',
        'residence',
        'referee_name',
        'referee_phone_number',
        'designation',
        'photo',
        'created_by',
        'fpo_id',
    ];

   
}
