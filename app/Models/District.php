<?php

namespace App\Models;

use App\Models\Divison;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;
    public function division(){

        return $this->belongsTo(Divison::class);
    }
    public function teacher(){
        return $this->hasMany(Teacher::class);
    }
    public function students(){

        return $this->hasMany(Student::class);
    }
}
