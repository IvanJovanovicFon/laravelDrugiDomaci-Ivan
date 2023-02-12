<?php

namespace App\Http\Controllers;

use App\Http\Resources\MeetingCollection;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetings =Meeting::all();
        return new MeetingCollection($meetings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'subject' => 'required|string|max:255',
            'room' => 'required|max:6',
            'date' => 'required',
            'user_id' => 'required',
            'professor_id' => 'required',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $meeting = Meeting::create([
            'subject' => $request->subject,
            'room' => $request->room,
            'date' => $request->date,
            'user_id' => Auth::user()->id,
            'professor_id' => $request->professor_id,
        ]);

        return response()->json(['Meeting created successfully', new MeetingResource($meeting)]);
    
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        return new MeetingResource($meeting);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {           
        // $validator = Validator::make($request->all(),[
        //     'subject' => 'required|string|max:255',
        //     'room' => 'required|string|max:11',
        //     'date' => 'required',
        //     'user_id' => 'required|integer',
        //     'doctor_id' => 'required|integer',
        // ]);

        // if($validator->fails()){
        //     return response()->json($validator->errors());
        // }

        // $meeting->subject = $request->subject;
        // $meeting->room = $request->room;
        // $meeting->date = $request->date;
        // $meeting->user_id = $request->user_id;
        // $meeting->professor_id = $request->professor_id;

        // $meeting->save();

        if(!is_null($request->subject)){
            $meeting->subject = $request->subject;
        }      
        if(!is_null($request->room)) 
        $meeting->room = $request->room;
        if(!is_null($request->date)) 
        $meeting->date = $request->date;
        if(!is_null($request->professor_id)) 
        $meeting->professor_id = $request->professor_id;
        $meeting->update();
        return response()->json(['Meeting updated successfully', new MeetingResource($meeting)]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return response()->json('Meeting deleted successfully');
    }
}
