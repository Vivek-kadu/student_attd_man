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

    public function course_details(): BelongsTo
    {
        return $this->belongsTo(Course::class,'courses_id','id');
    }

    public function division_details(): BelongsTo
    {
        return $this->belongsTo(Division::class,'divisions_id','id');
    }
    
    public function semester_details(): BelongsTo
    {
        return $this->belongsTo(Semester::class,'semesters_id','id');
    }
    
    
    public function subject_details(): BelongsTo
    {
        return $this->belongsTo(Subject::class,'subjects_id','id');
    }
}
