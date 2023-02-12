<?php

namespace App\Http\Controllers;

use App\Http\Resources\MeetingResource;
use App\Http\Resources\ProfessorCollection;
use App\Http\Resources\ProfessorResource;
use App\Models\Meeting;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professors =Professor::all();
        return new ProfessorResource($professors);
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
        $professor = Professor::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'faculty'=>$request->faculty,
            'department'=>$request->department,
            'title'=>$request->title,
        ]);

        return new ProfessorResource($professor);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {

        return new ProfessorResource($professor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $professor)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'department' => 'required|string',
            'faculty' => 'required|string',
            'title' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $professor->department = $request->department;
        $professor->faculty = $request->faculty;
        $professor->first_name = $request->first_name;
        $professor->last_name = $request->last_name;
        $professor->title = $request->title;
 
        $professor->update();
        return response()->json(['Professor updated successfully', new ProfessorResource($professor)]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professor)
    {
        $professor->delete();
        return response()->json('Proffessor deleted successfully');
    }
}
