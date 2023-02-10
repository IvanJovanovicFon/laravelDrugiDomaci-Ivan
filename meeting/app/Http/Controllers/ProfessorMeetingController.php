<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

class ProfessorMeetingController extends Controller
{
    public function index($professor_id){    
        $meetings = Meeting::get()->where('professor_id', $professor_id);
        if(is_null($meetings)){
            return response()->json('Data not found', 404);
        }
        return response()->json($meetings);
    }
}
