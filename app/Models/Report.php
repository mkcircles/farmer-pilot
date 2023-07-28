<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'report_type',
        'report_params',
        'report_status',
        'created_by',
        'report_url'
    ];

    //Set download url for report

    public function setReportUrlAttribute(){
        if($this->report_url!=''){
            $this->attributes['download_report_url'] = '/report/'.$this->report_url;
            
        }
    }
}
