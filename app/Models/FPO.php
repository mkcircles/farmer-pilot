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
        'fpo_contact_name',
        'contact_phone_number',
        'contact_email',
        'core_staff_count',
        'core_staff_positions',
        'registration_status',
        'fpo_membership_number',
        'fpo_male_membership',
        'fpo_female_membership',
        'fpo_male_youth',
        'fpo_female_youth',
        'fpo_field_agents',
        'Cert_of_Inc',
        'created_by',
    ];
} 
