<?php

namespace App\Http\Controllers;

use App\Http\Resources\MeetingCollection;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;
use Dotenv\Validator as DotenvValidator;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator as ValidationValidator;

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
    //     $validator = Validator::make($request->all(),[
    //         'department' => 'required|string|max:255',
    //         'room' => 'required|max:11',
    //         'date' => 'required',
    //         //'user_id' => 'required',
    //         'professor_id' => 'required',
    //         'facuty'=>'required',
    //     ]);

    //     if($validator->fails()){
    //         return response()->json($validator->errors());
    //     }

    //     $appointment = Meeting::create([
    //         'department' => $request->department,
    //         'room' => $request->room,
    //         'date' => $request->date,
    //         'user_id' => Auth::user()->id,
    //         'doctor_id' => $request->doctor_id,
    //     ]);

    //     return response()->json(['Meeting created successfully', new MeetingResource($appointment)]);
    // 
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        //
    }
}
