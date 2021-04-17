<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Divison extends Model
{
    use HasFactory;
    public function district(){
        return $this->hasMany(District::class);
    }
    public function teacher(){
        return $this->hasMany(Teacher::class);
    }
    public function students(){

        return $this->hasMany(Student::class);
    }
}
