<?php

namespace App\Http\Controllers;

use App\Models\attendence;
use App\Models\Course;
use App\Models\Division;
use App\Models\Master;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;

class   UserController extends Controller
{

    // student view 
    public function studentView()
    {
        $stu_data = Student::all();
        return view('student_view', compact('stu_data'));
    }

    // attendence View page whole logic 
    public function attendenceView(Request $request)
    {
        // dd($request);



        // $att_stu = Student::all();
        $stu_data = Student::all();

        // course filter
        if (isset($request->course) && $request->course != null) {
            $stu_data = $stu_data->where('courses_id', '==', $request->course);
        }
        // div filter 
        if (isset($request->division) && $request->division != null) {
            $stu_data = $stu_data->where('divisions_id', '==', $request->division);
        }
        // sem filter 
        if (isset($request->semester) && $request->semester != null) {
            $stu_data = $stu_data->where('semesters_id', '==', $request->semester);
        }


        $stu_course = Course::all();
        $stu_division = Division::all();
        $stu_semester = Semester::all();
        $stu_subject = Subject::all();
        $data = $request->all();
        return view('attendence_view', compact('stu_data', 'stu_course', 'stu_division', 'stu_semester', 'stu_subject', 'data'));
    }


    // adding student 
    public function addStudent()
    {
        $stu_course = Course::all();
        $stu_division = Division::all();
        $stu_semester = Semester::all();
        // dd($stu_course);
        return view('add_student', compact('stu_course', 'stu_division', 'stu_semester'));
    }


    // inserting student logic
    public function insertStudent(Request $request)
    {

        // dd($request);
        // dd($request->course_name);
        $stu =  new  Student();
        $stu->name = $request->student_name;
        $stu->email = $request->email;
        $stu->roll_no = $request->roll_no;
        $stu->courses_id = $request->course_name;
        $stu->divisions_id = $request->division_name;
        $stu->semesters_id = $request->semester_name;
        $stu->gender = $request->gender;
        $stu->phone_no = $request->phone_no;

        $stu->save();


        return redirect::to('/add_student');
    }

    // insert attendence 
    public function insertAttendence(Request $request)
    {
        foreach($request->hidden_stu_id as $key=>$hidden_stu_id){

            
            $att_stu = new attendence();
            
            $att_stu->s_course_id = $request->course;
            $att_stu->s_semesters_id = $request->semester;
            $att_stu->s_divisions_id = $request->division;
            $att_stu->s_subject_id = $request->subject;
            $att_stu->attendence_date = $request->attendence_date;
            
            $att_stu->students_id = $hidden_stu_id;
            
            //radio button
            $id = $request->hidden_stu_id;
            $tag_name = "stu_id_".$id;
            $val = $request->$tag_name;
            $att_stu->status = $val[$key];
            // radio btn end
            
            dd($request);
            $att_stu->save();
        }

        return redirect::to('/dashboard');



    }
}
