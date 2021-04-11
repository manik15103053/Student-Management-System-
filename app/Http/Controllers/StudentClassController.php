<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function classCreate(){

        $studentClass = StudentClass::all();

        return view('admin.layouts.class.index',compact('studentClass'));
    }

    public function classStore(Request $request){

        //dd($request->all());

        $this->validate($request,[

            'name'    =>    'required',
            'description' =>  'required'
        ]);
       $studentClass = new StudentClass();
       
       $studentClass->name = $request->name;
       $studentClass->description = $request->description;
       $studentClass->save();
       return redirect()->back()->with('msg','Student Class Has Added Successfully.');
    }

    public function classEdit($id){

        $class = StudentClass::find($id);

        return view('admin.layouts.class.edit',compact('class'));
    }
}
