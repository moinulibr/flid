<?php

namespace App\Traits\UserIdAdd;

use App\Models\Backend\Visitor;
use Illuminate\Support\Facades\Auth;

trait UserIdAddTrait
{

    protected $id;

    

    protected function visitorIpdAdd()
    {
        $unique_id = $this->getUserIpAddr();
        if($visit = Visitor::where('unique_id',$unique_id)->first())
        {
           return $visit;
        }else{
            $visitor            = new Visitor();
            $visitor->unique_id = $unique_id;
            $visitor->status    = 1;
            $visitor->save();
            return $visitor;
        }
    }

    protected function getUserIpAddr(){
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';    
        return $ipaddress;
    }


    

}
