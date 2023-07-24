<?php

namespace Database\Seeders;

use App\Traits\HelperTraits;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AgentDataSeeder extends Seeder
{
    use HelperTraits;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agents =[
            ['first_name'=>'Alfred ','last_name'=>'Ocaya','email'=>'','phone_number'=>'256780771391','age'=>'50','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Obutu Daniel','referee_phone_number'=>'256772988090','fpo_id'=>'370'],
            ['first_name'=>'Richard','last_name'=>'Loum','email'=>'richieloum@gmail.com','phone_number'=>'256772603525','age'=>'41','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Owachi Susan','referee_phone_number'=>'256773607312','fpo_id'=>'370'],
            ['first_name'=>'Richard ','last_name'=>'Opwonya','email'=>'','phone_number'=>'256777858754','age'=>'27','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Obutu Daniel','referee_phone_number'=>'256772988090','fpo_id'=>'370'],
            ['first_name'=>'Paul Emmanuel','last_name'=>'Opiyo','email'=>'','phone_number'=>'256788731405','age'=>'32','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Obutu Daniel','referee_phone_number'=>'256772988090','fpo_id'=>'370'],
            ['first_name'=>'Kenneth ','last_name'=>'Okello','email'=>'okellokeneth2020@gmil.com','phone_number'=>'256774332427','age'=>'32','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Kinyera Morris','referee_phone_number'=>'256779530093','fpo_id'=>'370'],
            ['first_name'=>'Brian ','last_name'=>'Ojok','email'=>'ojokojokbrian1994@gmail.com','phone_number'=>'256788978317','age'=>'29','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Obutu Daniel','referee_phone_number'=>'256772988090','fpo_id'=>'370'],
            ['first_name'=>'Jackson','last_name'=>'Odong Onen','email'=>'onenjackson39@gmail.com','phone_number'=>'256775848113','age'=>'41','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Obutu Daniel','referee_phone_number'=>'256772988090','fpo_id'=>'370'],
            ['first_name'=>'Anna','last_name'=>'Akidi','email'=>'','phone_number'=>'256777636297','age'=>'27','gender'=>'Female','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Obutu Daniel','referee_phone_number'=>'256772988090','fpo_id'=>'370'],
            ['first_name'=>'Harriet','last_name'=>'Acola','email'=>'acolaharriet88@gmail.com','phone_number'=>'256780690810','age'=>'35','gender'=>'Female','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Obutu Daniel','referee_phone_number'=>'256772988090','fpo_id'=>'370'],
            ['first_name'=>'Denis','last_name'=>'Lemoyi ','email'=>'','phone_number'=>'256772995664','age'=>'57','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Obutu Daniel','referee_phone_number'=>'256772988090','fpo_id'=>'370'],
            ['first_name'=>'Molly ','last_name'=>'Atima','email'=>'mollyatima@gmail.com','phone_number'=>'256784788784','age'=>'36','gender'=>'Female','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Obutu Daniel','referee_phone_number'=>'256772988090','fpo_id'=>'370'],
            ['first_name'=>'Simon ','last_name'=>'Odong','email'=>'simonodong@gmail.com','phone_number'=>'256789001232','age'=>'30','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Obutu Daniel','referee_phone_number'=>'256772988090','fpo_id'=>'370'],
            ['first_name'=>'Boniface','last_name'=>'Opwonya','email'=>'','phone_number'=>'256760245125','age'=>'29','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Obutu Daniel','referee_phone_number'=>'256772988090','fpo_id'=>'370'],
            ['first_name'=>'Sunday','last_name'=>'Okello','email'=>'Sundayokello52@gmail.com','phone_number'=>'256784117340','age'=>'28','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Obutu Daniel','referee_phone_number'=>'256772988090','fpo_id'=>'370'],
            ['first_name'=>'Isaac ','last_name'=>'Ocira Lakony','email'=>'isaacocira10@gmail.com','phone_number'=>'256782769791','age'=>'25','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Obutu Daniel','referee_phone_number'=>'256772988090','fpo_id'=>'370'],
            ['first_name'=>'Francis ','last_name'=>'Akena','email'=>'akenaf97@gmail.com','phone_number'=>'256777328743','age'=>'33','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Obutu Daniel','referee_phone_number'=>'256772988090','fpo_id'=>'370'],
            ['first_name'=>'Sally','last_name'=>'Oroma','email'=>'oromaflaviasally@gmail.com','phone_number'=>'256772971820','age'=>'28','gender'=>'Female','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Obutu Faniel','referee_phone_number'=>'256772988090','fpo_id'=>'370'],
            ['first_name'=>'Moses','last_name'=>'Rwotomiyo','email'=>'rwotomiyomoseselvis93@gmail.com','phone_number'=>'256786265427','age'=>'30','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Okeny Justine','referee_phone_number'=>'256779707915','fpo_id'=>'189'],
            ['first_name'=>'Christopher','last_name'=>'Okech','email'=>'','phone_number'=>'256779745410','age'=>'43','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Okeny Justine','referee_phone_number'=>'256779707915','fpo_id'=>'189'],
            ['first_name'=>'Richard','last_name'=>'Okello','email'=>'richardokello707675@gmail.com','phone_number'=>'256778928458','age'=>'28','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Okeny Justine','referee_phone_number'=>'256779707915','fpo_id'=>'189'],
            ['first_name'=>'Irene ','last_name'=>'Apiyo','email'=>'','phone_number'=>'256761119229','age'=>'29','gender'=>'Female','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Okeny Justine','referee_phone_number'=>'256779707915','fpo_id'=>'189'],
            ['first_name'=>'Richard','last_name'=>'Okot','email'=>'','phone_number'=>'256772430325','age'=>'34','gender'=>'Female','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Okeny Justine','referee_phone_number'=>'256779707915','fpo_id'=>'189'],
            ['first_name'=>'Richard ','last_name'=>'Ocaya','email'=>'richardocaya97@gmail.com','phone_number'=>'256788554933','age'=>'32','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Okeny Justine','referee_phone_number'=>'256779707915','fpo_id'=>'189'],
            ['first_name'=>'Flavia','last_name'=>'Apiyo','email'=>'','phone_number'=>'256787226266','age'=>'31','gender'=>'Female','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Okeny Justine','referee_phone_number'=>'256779707915','fpo_id'=>'189'],
            ['first_name'=>'Margaret','last_name'=>'Lalam','email'=>'','phone_number'=>'256786815851','age'=>'45','gender'=>'Female','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Okeny Justine','referee_phone_number'=>'256779707915','fpo_id'=>'189'],
            ['first_name'=>'Geofrey ','last_name'=>'Ocan','email'=>'','phone_number'=>'256785229047','age'=>'35','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Okeny Justine','referee_phone_number'=>'256779707915','fpo_id'=>'189'],
            ['first_name'=>'Ben','last_name'=>'Acellam','email'=>'','phone_number'=>'256771682022','age'=>'31','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Okeny Justine','referee_phone_number'=>'256779707915','fpo_id'=>'189'],
            ['first_name'=>'Bosco','last_name'=>'Odida','email'=>'','phone_number'=>'256777320319','age'=>'42','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Okeny Justine','referee_phone_number'=>'256779707915','fpo_id'=>'189'],
            ['first_name'=>'Christopher','last_name'=>'Okema','email'=>'','phone_number'=>'256774855582','age'=>'35','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Okeny Justine','referee_phone_number'=>'256779707915','fpo_id'=>'189'],
            ['first_name'=>'Welsy','last_name'=>'Amito','email'=>'','phone_number'=>'256785388068','age'=>'26','gender'=>'Male','designation'=>'Agent','residence'=>'Pagoro','referee_name'=>'Okeny Justine','referee_phone_number'=>'256779707915','fpo_id'=>'189']
        ];

        foreach ($agents as $agent) {
            $agent['photo'] = 'https://ui-avatars.com/api/?background=random&size=128&name='.$agent['first_name'].'+'.$agent['last_name'];
            $agent['created_by'] = 1;
            $agent['agent_code'] = $this->generateAgentCode();
            $agent['email'] = $agent['email']? $agent['email'] : uniqid().'@agent.com';

           
           $ag = \App\Models\Agent::create($agent);

           $user = new \App\Models\User();
           $user->name = $ag->first_name.' '.$ag->last_name;
           $user->email = $ag->email;
           $user->phone_number = $ag->phone_number;
           $user->password = Hash::make('password');
           $user->role = 'agent';
           $user->save();
        }

        
    }
}
