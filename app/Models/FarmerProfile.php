<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmerProfile extends Model
{
    use HasFactory;

    protected $with = ['agent', 'biometrics'];

    protected $fillable = [
        'farmer_id',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'education_level',
        'phone_number',
        'id_number',
        'marital_status',
        'district',
        'county',
        'sub_county',
        'parish',
        'village',
        'fpo_id',
        'farmer_cordinates',
        'next_of_kin',
        'next_of_kin_contact',
        'next_of_kin_relationship',
        'male_members_in_household',
        'female_members_in_household',
        'members_above_18',
        'children_below_5',
        'school_going_children',
        'head_of_family',
        'how_much_do_you_earn_from_agricultural_activities',
        'how_much_do_you_earn_from_non_agricultural_activities',
        'do_you_have_an_account_with_an_FI',
        'farm_size',
        'farm_size_under_agriculture',
        'land_ownership',
        'type_of_farming',
        'crops_grown',
        'animals_kept',
        'estimated_produce_value_last_season',
        'estimated_produce_value_this_season',
        'data_captured_by',
        'agent_id',
        'photo',
        'group_id',
        'validation_status',
        'validation_reason',
        'reg_type',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function fpo()
    {
        return $this->belongsTo(FPO::class, 'fpo_id');
    }

    public function biometrics(){
        return $this->hasOne(MastercardProfileDetails::class, 'entityID', 'farmer_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }








}
