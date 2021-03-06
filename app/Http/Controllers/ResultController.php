<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use App\Models\Subject;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function createResult(){

        $results = Result::orderBy('id','desc')->get();
        $studentClass = StudentClass::orderBy('id','asc')->get();
        $subject = Subject::orderBy('name','desc')->get();
        $student = Student::orderBy('id','desc')->get();
        $user = Auth::user();

        return view('admin.layouts.result.create',compact('results','studentClass','subject','student','user'));

    }
    public function storeResult(Request $request){

        $this->validate($request,[

            'name'  =>  'required',
            'class_id'  =>  'required',
            'subject_id'  =>  'required',
            'student_id'  =>  'required',
            'description'  =>  'required'
            
        ]);
        $result = new Result();
        $result->name = $request->name;
        $result->student_id = $request->student_id;
        $result->class_id = $request->class_id;
        $result->subject_id = $request->subject_id;
        $result->description = $request->description;
        $result->save();
        return redirect()->back()->with('msg','Result Has Added successfully.');
    }

    public function editResult($id){

        $result = Result::find($id);
        //dd($result->all());
        $studentClass = StudentClass::orderBy('id','asc')->get();
        $subject = Subject::orderBy('name','desc')->get();
        $student = Student::orderBy('name','desc')->get();
        $user = Auth::user();
        return view('admin.layouts.result.edit',compact('result',
        'studentClass','subject','student','user'
        
    ));

    }

    public function updateResult(Request $request ,$id){

        $this->validate($request,[

            'name'  =>  'required',
            'class_id'  =>  'required',
            'subject_id'  =>  'required',
            'student_id'  =>  'required',
            'description'  =>  'required'
            
        ]);
        $result =  Result::find($id);
        $result->name = $request->name;
        $result->student_id = $request->student_id;
        $result->class_id = $request->class_id;
        $result->subject_id = $request->subject_id;
        $result->description = $request->description;
        $result->save();
        return redirect(route('result.create'))->with('msg','Result Has Updated successfully.');

    }
    public function deleteResult($id){

        $result = Result::find($id);
        if(!is_null($result)){

            $result->delete();
            return redirect(route('result.create'))->with('msg','Result Has Deleted Successfully.');
        }
    }

    public function search(Request $request){
        $search = $request->search;
        $result = Result::orWhere('title','like','%'.$search.'%')
                            ->orWhere('name','like','%'.$search.'%')
                            ->orWhere('phone','like','%'.$search.'%')
                            ->orWhere('email','like','%'.$search.'%')
                            ->orWhere('number','like','%'.$search.'%')
                            ->orderBy('id','desc')
                            ->paginate(5);

             return view('admin.layouts.pages.search',compact('search','result'));               
    }

    public function viewStudent($id){

        $student = Student::find($id);
        $user = Auth::user();
       // dd($student->all());
        return view('admin.layouts.pages.view',compact('student','user'));
    }
}
