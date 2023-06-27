<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FPO extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fpo_name',
        'district',
        'county',
        'sub_county',
        'parish',
        'village',
        'main_crop',
        'fpo_member_count',
        'fpo_contact_name',
        'contact_phone_number',
        'Cert_of_Inc',
    ];
}
