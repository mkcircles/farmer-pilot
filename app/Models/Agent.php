<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $with = ['fpo'];
    protected $with_count = ['farmers'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'agent_code',
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
        'device_id',
        'assigned_phone_number',

    ];

    public function fpo()
    {
        return $this->belongsTo(FPO::class);
    }

    public function farmers(){
        return $this->hasMany(FarmerProfile::class, 'agent_id');
    }


   
}
