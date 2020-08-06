<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class LogActivity extends Model
{
    protected $fillable = [
        'subject', 'url', 'method', 'ip', 'agent', 'user_id','logger_name' ,'current_location'
    ];

}
