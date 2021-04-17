<?php

namespace App\Models;

use App\Models\Divison;
use App\Models\Student;
use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;
    public function division(){

        return $this->belongsTo(Divison::class);
    }
    public function district(){

        return $this->belongsTo(District::class);
    }
    public function students(){

        return $this->hasMany(Student::class);
    }
}
