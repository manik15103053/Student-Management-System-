<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function createSubject(){

        $subject = Subject::orderBy('name','desc')->get();
        $studentClass = StudentClass::orderBY('id','asc')->get();

        return view('admin.layouts.subject.create',compact('subject','studentClass'));
    }
    public function storeSubject(Request $request){

        $this->validate($request,[

            'name'  =>   'required',
            'class_id'  =>   'required',
            'description'  =>   'required'
        ]);

        $subject = new Subject();
        $subject->name  = $request->name;
        $subject->class_id  = $request->class_id;
        $subject->description  = $request->description;
        $subject->save();

        return redirect()->back()->with('msg','Subject Has Added Successfully.');

    }
    public function editSubject($id){

        $subject = Subject::find($id);
        $studentClass = StudentClass::orderBY('id','asc')->get();

        return view('admin.layouts.subject.edit',compact('subject','studentClass'));

    }

    public function updateSubject(Request $request ,$id){

        $this->validate($request,[

            'name'  =>   'required',
            'class_id'  =>   'required',
            'description'  =>   'required'
        ]);

        $subject = Subject::find($id);
        $subject->name  = $request->name;
        $subject->class_id  = $request->class_id;
        $subject->description  = $request->description;
        $subject->save();

        return redirect(route('subject.create'))->with('msg','Subject Has Updated Successfully.');

    }
    public function deleteSubject($id){

        $subject = Subject::find($id);
        if(!is_null($subject)){

            $subject->delete();
            return redirect(route('subject.create'))->with('msg','Subject Has deleted Successfully.');
        }else{

            return redirect()->back()->with('msg','There is no data ');
        }
    }
}
