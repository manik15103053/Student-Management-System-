<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Subject;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;
    public function class(){

        return $this->belongsTo(StudentClass::class);

    }
    public function subject(){

        return $this->belongsTo(Subject::class);
        
    }
    public function student(){

        return $this->belongsTo(Student::class);
        
    }
}
