<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Division;
use App\Models\Semester;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class   UserController extends Controller
{
    public function studentView()
    {
        return view('student_view');
    }
    public function attendenceView()
    {
        return view('attendence_view');
    }
    public function addStudent()
    {
        $stu_course = Course::all();
        $stu_division = Division::all();
        $stu_semester = Semester::all();
        $stu_year = Year::all();
        // dd($stu_course);
        return view('add_student',compact('stu_course','stu_division','stu_semester','stu_year'));
    }


    // inserting student logic
    public function insertStudent(Request $request)
    {
        dd($request);
        $stu =  new  Student();
        $stu->name=$request->student_name;
        $stu->email=$request->email;
        $stu->roll_no=$request->roll_no;
        

        
        
        return redirect::to('/add_student');
    }
}
