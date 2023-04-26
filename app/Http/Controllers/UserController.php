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
    public function studentView(Request $request)
    {
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

        return view('student_view', compact('stu_data', 'stu_course', 'stu_division', 'stu_semester', 'stu_subject', 'data'));
    }

    // attendence View page whole logic 
    public function attendenceView(Request $request)
    {
        // dd($request);

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

    // edit student 
    public function EditStudent($id)
    {
        $stu_division = Division::all();
        $stu_semester = Semester::all();
        $stu_course = Course::all();
        $student_edit_data = Student::where('id',$id)->first();
        // dd($student_edit_data);
        return view('edit_student',compact('student_edit_data','stu_course','stu_division','stu_semester'));
    }

    // updating student 

    public function updateStudent(Request $request)
    {
        // dd($request->addmission_date);
        $update = Student::where('id',$request->student_id)->update([
            'name' => $request->student_name,
            'email'=> $request->email,
            'roll_no'=> $request->roll_no,
            'courses_id' => $request->course_name,
            'divisions_id' => $request->division_name,
            'semesters_id' => $request->semester_name,
            'gender' => $request->gender,
            'phone_no' => $request->phone_no,
            'addmission_data'=>$request->addmission_date,
        ]);

        return redirect::to('/student_view');
    }


    // delete student 

    public function deleteStudent($id)
    {
        Student::where('id',$id)->delete();

        return redirect::to('/student_view');

    }


    // insert attendence 
    public function insertAttendence(Request $request)
    {
        // dd($request);


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

        foreach ($stu_data as $row) {

            $tag_name = "stu_id_" . $row->id;
            if (isset($request->{$tag_name})) {
                $val = $request->{$tag_name};

                $att_stu = new attendence();

                $att_stu->s_course_id = $request->course;
                $att_stu->s_semesters_id = $request->semester;
                $att_stu->s_divisions_id = $request->division;
                $att_stu->s_subject_id = $request->subject;
                $att_stu->attendence_date = $request->attendence_date;

                // $att_stu->students_id = $hidden_stu_id;
                $att_stu->students_id = $row->id;

                //radio button
                $id = $row->id;
                $att_stu->status = $val;
                // radio btn end

                // dd($request);
                
                $att_stu->save();
            }
        }

        return redirect::to('/dashboard');
    }
}
