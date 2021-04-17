<?php

namespace App\Models;

use App\Models\Result;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    public function class(){

        return $this->belongsTo(StudentClass::class);
    }
    public function result(){
        return $this->hasMany(Result::class);
    }
}
