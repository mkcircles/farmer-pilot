<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnffeOutreach extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'gender',
        'phone_number',
        'id_number',
        'district',
        'sub_county',
        'parish',
        'village',
        'fpo_name',
        'group_name',
        'group_code',
        'farm_size',
        'crops_grown',
    ];


}
