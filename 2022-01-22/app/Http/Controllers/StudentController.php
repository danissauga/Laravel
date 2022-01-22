<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\AttendanceGroup;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request; 

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
            return view('students.index',['students' => $students]); // clients/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attendancegroups = AttendanceGroup::all();     
        return view('students.create', ['attendancegroups' => $attendancegroups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
            $student->name = $request->student_name;
            $student->surename = $request->student_surename;
            $student->group_id = $request->student_group;
            if ($request->student_image) {$student->image_url = $request->student_image; } 
                else { $student->image_url = '#';  }

            $student->save();
            //echo '<pre>';
            //print_r($request->client_username);
            return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show',['student'=>$student]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $attendancegroups = AttendanceGroup::all();     
        return view('students.edit', ['student' => $student, 'attendancegroups' => $attendancegroups]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
            $student->name = $request->student_name;
            $student->surename = $request->student_surename;
            $student->group_id = $request->student_group;
            if ($request->student_image) {$student->image_url = $request->student_image; } 
                else { $student->image_url = '#';  }
            $student->save();
            return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index');
    }
}
