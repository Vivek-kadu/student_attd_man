<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class attendence extends Model
{
    use HasFactory;
    protected $table = "attendences";
    protected $primarykey = "id";
    
    public function student_details(): BelongsTo
    {
        return $this->belongsTo(Student::class,'students_id','id');
    }
    
    public function course_details(): BelongsTo
    {
        return $this->belongsTo(Course::class,'s_course_id','id');
    }

    public function division_details(): BelongsTo
    {
        return $this->belongsTo(Division::class,'s_divisions_id','id');
    }
    
    public function semester_details(): BelongsTo
    {
        return $this->belongsTo(Semester::class,'s_semesters_id','id');
    }
    
    
    public function subject_details(): BelongsTo
    {
        return $this->belongsTo(Subject::class,'s_subject_id','id');
    }


    protected $fillable = [
        'status',
        'students_id',
        's_course_id ',
        's_semesters_id ',
        's_divisions_id ',
        's_subject_id ',
        'attendence_date'
    ];
}
