<?php

namespace App\Traits;

use App\Models\Agent;
use App\Models\FarmerProfile;

trait HelperTraits
{
    public function generateFarmerId()
    {
        $farmerId = strtoupper('FAR-'.substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 5));
        if($this->farmerIdExists($farmerId)){
            $this->generateFarmerId();
        }
        return $farmerId;
    }

    public function farmerIdExists($farmerId)
    {
        return FarmerProfile::where('farmer_id', $farmerId)->exists();
    }

    public function generateAgentCode()
    {
        $agentCode = strtoupper('AGT-'.substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 5));
        if($this->agentCodeExists($agentCode)){
            $this->generateAgentCode();
        }
        return $agentCode;
    }

    public function agentCodeExists($agentCode)
    {
        return Agent::where('agent_code', $agentCode)->exists();
    }

    public function formatMobilePhoneNumber($phoneNumber){
        if (preg_match("/^[256]+[0-9]{12,12}$/", $phoneNumber)) {
            return $phoneNumber;
        }elseif (preg_match("/^[07]+[0-9]{9,10}$/", $phoneNumber)){
            return '256'.substr($phoneNumber,-9);
        }
        
        return $phoneNumber;
    }
}
