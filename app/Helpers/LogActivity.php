<?php


namespace App\Helpers;
use Request;
use App\LogActivity as LogActivityModel;
use GeoIP;

class LogActivity
{


    public static function addToLog($subject)
    {
    	$log = [];
    	$log['subject'] = $subject ? : 'Onclick';
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip'] = Request::ip();
    	$log['agent'] = Request::header('user-agent');
        $log['user_id'] = auth()->check() ? auth()->user()->id : '';
        $arr_ip = geoip()->getLocation(Request::ip());
        $log['current_location'] = $arr_ip->city .', ' .$arr_ip->state. ', '. $arr_ip->country;
        $log['logger_name'] = auth()->check() ? auth()->user()->first_name .' '. auth()->user()->last_name : 'Anonymous' ;
    	LogActivityModel::create($log);
    }


    public static function logActivityLists()
    {
    	return LogActivityModel::latest()->get();
    }

    public static function logActivityId($id)
    {
    	return LogActivityModel::find($id);
    }
}