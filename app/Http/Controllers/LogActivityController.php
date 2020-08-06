<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GeoIP;
use DB;
use App\User;
use LogActivity;
class LogActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logActivity($id)
    {
        $users = User::find($id);
        $logs = \LogActivity::logActivityLists();
        return view('logs.index',compact('logs'))->with([
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        $log = \LogActivity::logActivityId($id);
        return view('logs.show')->with(['log' => $log]);
    }
}
