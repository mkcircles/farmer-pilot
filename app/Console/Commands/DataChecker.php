<?php

namespace App\Console\Commands;

use App\Models\FarmerProfile;
use Illuminate\Console\Command;

class DataChecker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:data-checker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Data Check for consistency';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //Fetch User where validation reason is null
        $farmers = FarmerProfile::whereNull('validation_reason')->limit(10)->get();
        foreach ($farmers as $farmer) {
            $validate = [];
            //$validate['status'] = 'checked';

            //Check Duplicate NIN
            $duplicateNIN = is_null($farmer->id_number) ? null : $this->checkDuplicateNIN($farmer->id_number, $farmer->id);
            if(!is_null($duplicateNIN))
                $validate['duplicate_nin']= $duplicateNIN;

            //Check for duplicate first_nae and last_name and dob and gender
            $duplicateName = $this->checkDuplicateName($farmer->first_name, $farmer->last_name, $farmer->dob, $farmer->gender, $farmer->id);
            if(!is_null($duplicateName))
                $validate['duplicate_name']= $duplicateName;

            //Check for duplicate phone_number
            $duplicatePhone = is_null($farmer->phone_number) ? null : $this->checkDuplicatePhoneNumber($farmer->phone_number, $farmer->id);
            if(!is_null($duplicatePhone))
                $validate['duplicate_phone']= $duplicatePhone;
            
            //Count size of array validate
            $size = count($validate);
            
            if($size > 0){
                $validate['status']='error';
            }else{
                $validate['status']='valid';
            }

            $farmer->validation_reason = json_encode($validate);
            $farmer->save();

        }

    }


    private function checkDuplicateNIN($nin, $id)
    {
        //Check Duplicate NIN where id is not equal to farmer profile id
        $duplicate = FarmerProfile::where('id', '!=', $id)->where('id_number', $nin)->first();
        return $duplicate ? $duplicate->farmer_id : null;
    }

    private function checkDuplicateName($first_name, $last_name, $dob, $gender, $id)
    {
        $check = FarmerProfile::where('first_name', $first_name)->where('last_name', $last_name)->where('dob', $dob)->where('gender', $gender)->where('id', '!=', $id)->first();
        return $check ? $check->farmer_id : null;
    }

    private function checkDuplicatePhoneNumber($phone, $id){
        $check = FarmerProfile::where('phone_number', $phone)->where('id', '!=', $id)->first();
        return $check ? $check->farmer_id : null;
    }
}
