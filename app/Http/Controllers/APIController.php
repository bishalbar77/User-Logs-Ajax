<?php

namespace App\Http\Controllers;

use App\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use \Cache;

class APIController extends Controller
{

    public function users()
    {
        $users = User::select(['id', 'first_name', 'last_name', 'email', 'last_seen']);

        return Datatables::of($users)
            
            ->addColumn('actions', function ($users) {
                return \Carbon\Carbon::parse($users->last_seen)->diffForHumans();
            })
            ->addColumn('status', function ($users) 
            {
                if(Cache::has('user-is-online-' . $users->id)) 
                {
                return 'Online';
                }
                else
                {
                    return 'Offline';
                }                     
            })
            ->addColumn('action', function ($users) {
                return '<a class="pl-4" href="/logActivity/'. $users->id.'" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="View">
                <i class="fa fa-info-circle text-info"></i>';
            })
            ->editColumn('id', '{{$id}}')
            ->setRowId('id')
            ->setRowData(['id' => 'test',])
            ->setRowAttr(['color' => 'red',])
            
            ->make(true);
    }

}
