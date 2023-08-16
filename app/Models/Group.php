<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_code',
        'group_name',
    ];

    public function farmerProfiles()
    {
        return $this->hasMany(FarmerProfile::class);
    }
}
