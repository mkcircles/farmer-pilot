<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MastercardProfileDetails extends Model
{
    use HasFactory;


    protected $fillable = [
        'entityType',
        'entityID',
        'rID',
        'consentGUID',
        'subjectID',
        'enrollmentStatus',
        'hasBiometricToken',
        'biometricToken',
        'consumerDeviceId',
        'possible_duplicate'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function farmerProfile()
    {
        return $this->belongsTo(FarmerProfile::class, 'entityID', 'farmer_id');
    }

    public function agentProfile()
    {
        return $this->belongsTo(Agent::class, 'entityID', 'agent_code');
    }

    public function fpoProfile()
    {
        return $this->belongsTo(FPO::class, 'entityID');
    }


}
