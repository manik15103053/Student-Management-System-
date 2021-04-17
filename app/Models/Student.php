<?php

namespace App\Models;

use App\Models\Result;
use App\Models\Divison;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\District;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    public function class(){
        return $this->belongsTo(StudentClass::class);
    }
    public function division(){
        return $this->belongsTo(Divison::class);
    }
    public function district(){
        return $this->belongsTo(District::class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function section(){
        return $this->belongsTo(Section::class);
    }
    public function result(){
        return $this->belongsTo(Result::class,'result_id');
    }
    public function subject(){
        return $this->hasMany(Subject::class,'subject_id');
    }

}
