<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DemoInput;
use App\User;
use \Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $online = 0;
        $offline=0;
        foreach($users as $user)
        {
            if(Cache::has('user-is-online-' . $user->id))
            {
                $online++;
            }
            else
            {
                $offline++;
            }
        }
        \LogActivity::addToLog('');
        return view('home')->with([
            'online' => $online,
            'offline' => $offline
        ]);
    }

    public function demo()
    {
        return view('user.demo');
    }

    public function store(Request $request)
    {
        $demo = new DemoInput;
        $demo->name=$request->name;
        $demo->email=$request->email;
        $demo->save();
        \LogActivity::addToLog($demo);
        return view('user.demo');
    }

    public function ajax()
    {
        return view('user.datatables');
    }
}
