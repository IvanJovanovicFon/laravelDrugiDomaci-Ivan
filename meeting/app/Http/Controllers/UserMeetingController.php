<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

class UserMeetingController extends Controller
{
    public function index($user_id){    
        $meetings = Meeting::get()->where('user_id', $user_id);
        if(is_null($meetings)){
            return response()->json('Data not found', 404);
        }
        return response()->json($meetings);
    }
}

