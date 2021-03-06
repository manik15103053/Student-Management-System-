<?php

namespace App\Models;

use App\Models\Result;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentClass extends Model
{
    use HasFactory;

    public function students(){
        return $this->hasMany(Student::class);
    }
    
    public function subject(){

        return $this->hasMany(Subject::class);
    }
    public function result(){
        return $this->hasMany(Result::class);
    }
}
