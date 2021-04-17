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

        $studentClass = StudentClass::find($id);

        return view('admin.layouts.class.edit',compact('studentClass'));
    }
    public function classUpdate(Request $request ,$id){

        $this->validate($request,[

            'name'    =>    'required',
            'description' =>  'required'
        ]);
       $studentClass = StudentClass::find($id);
       
       $studentClass->name = $request->name;
       $studentClass->description = $request->description;
       $studentClass->save();
       return redirect(route('class.create'))->with('msg','Student Class Has Updated Successfully.');
    }
    public function classDelete($id){


        $studentClass  = StudentClass::find($id);
        if(!is_null($studentClass )){
            $studentClass->delete();

            return redirect(route('class.create'))->with('msg','Student Class Has Deleted Successfully');
        
    }else{
        return redirect()->back()->with('msg','There is no Data');
    }
}
}