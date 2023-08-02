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
        'biometricToken',
        'consumerDeviceId',
    ];
}
