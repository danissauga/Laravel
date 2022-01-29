<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\AttendanceGroup;
use App\Models\Difficulty;
use App\Models\Student;
use App\Http\Requests\StoreAttendanceGroupRequest;
use App\Http\Requests\UpdateAttendanceGroupRequest;
use Illuminate\Http\Request; 

class AttendanceGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $attendancegroups = AttendanceGroup::all();
       return view('attendancegroup.index', ['attendancegroups' => $attendancegroups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        $difficulies = Difficulty::all();  
        return view('attendancegroup.create', ['schools' => $schools], ['difficulties' => $difficulies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttendanceGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attendanceGroup = new AttendanceGroup;
        $attendanceGroup->name = $request->attendancegroup_name;
        $attendanceGroup->difficulty_id = $request->attendancegroup_difficulties;
        $attendanceGroup->school_id = $request->attendancegroup_schools;
        $attendanceGroup->description = $request->attendancegroup_description;

        $attendanceGroup->save();
        return redirect()->route('attendancegroup.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceGroup $attendanceGroup)
    { 
        return view('attendancegroup.show',['attendanceGroup'=>$attendanceGroup]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceGroup $attendanceGroup)
    {
        $schools = School::all();
        $difficulties = Difficulty::all(); 
        return view('attendancegroup.edit',['attendanceGroup'=>$attendanceGroup, 'schools'=>$schools, 'difficulties'=>$difficulties]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendanceGroupRequest  $request
     * @param  \App\Models\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttendanceGroup $attendanceGroup)
    {
        $attendanceGroup->name = $request->attendancegroup_name;
        $attendanceGroup->difficulty_id = $request->attendancegroup_difficulties;
        $attendanceGroup->school_id = $request->attendancegroup_schools;
        $attendanceGroup->description = $request->attendancegroup_description;

        $attendanceGroup->save();
        return redirect()->route('attendancegroup.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceGroup $attendanceGroup)
    {
       $attendanceGroups = $attendanceGroup->schoolsCount;
        if (count($attendanceGroups) != 0) {
            return redirect()->route('attendancegroup.index')->with('error_message','Delete is not possible because Attendance Group has schools and students');
        }

        $attendanceGroups->delete();
            return redirect()->route('attendancegroup.index')->with('success_message','Record removed success!');
    }
}