<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Division;
use App\Models\Master;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class   UserController extends Controller
{
    public function studentView()
    {
        $stu_data = Student::all();
        return view('student_view',compact('stu_data'));
    }
 

    public function attendenceView(Request $request)
    {
        // dd($request);
        
       

        $att_stu = Student::all();
        // course filter
        if(isset($request->course) && $request->course!=null){
            $att_stu = $att_stu->where('courses_id','==',$request->course);
        }
        // div filter 
        if(isset($request->division) && $request->division!=null){
            $att_stu = $att_stu->where('divisions_id','==',$request->division);
        }
        // sem filter 
        if(isset($request->semester) && $request->semester!=null){
            $att_stu = $att_stu->where('semesters_id','==',$request->semester);
        }
        

        // $stu_data = Student::all();
        $stu_course = Course::all();
        $stu_division = Division::all();
        $stu_semester = Semester::all();
        $stu_subject = Subject::all();
        $data = $request->all();
        return view('attendence_view',compact('stu_course','stu_division','stu_semester','stu_subject','att_stu','data'));
    }



    public function addStudent()
    {
        $stu_course = Course::all();
        $stu_division = Division::all();
        $stu_semester = Semester::all();
        // dd($stu_course);
        return view('add_student',compact('stu_course','stu_division','stu_semester'));
    }


    // inserting student logic
    public function insertStudent(Request $request)
    {
        
        // dd($request);
        // dd($request->course_name);
        $stu =  new  Student();
        $stu->name=$request->student_name;
        $stu->email=$request->email;
        $stu->roll_no=$request->roll_no;
        $stu->courses_id=$request->course_name;
        $stu->divisions_id=$request->division_name;
        $stu->semesters_id=$request->semester_name;
        $stu->gender=$request->gender;
        $stu->phone_no=$request->phone_no;

        $stu->save();

        
        return redirect::to('/add_student');
    }

    
}
