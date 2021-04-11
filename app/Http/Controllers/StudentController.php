<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;




class StudentController extends Controller
{
    public function home(){

        $students = Student::all();
        
        $studentClass = StudentClass::all();
        //dd($studentClass->all());
        return view('admin.layouts.pages.home',compact('students','studentClass'));
    }

    public function index(Request $request){

        $studentClass = StudentClass::all();
        $students = Student::all();
        $students = Student::where('class_id',$request->class_id)->get();


        return view('admin.layouts.pages.index',compact('studentClass','students'));
    }
    public function create(){

        $studentClass = StudentClass::all();
        return view('admin.layouts.pages.create',compact('studentClass'));
    }

    public function store(Request $request){
        $this->validate($request,[

            'name'  =>     'required',
            'email'  =>     'required',
            'phone'  =>     'required',
            'district'  =>     'required',
            'country'  =>     'required',
            'date'  =>     'required'
            

        ]);
        if($request->hasFile('student_image')){
            $image = $request->file('student_image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/student/' .$img);
            Image::make($image)->save($location);
        }
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->district = $request->district;
        $student->country = $request->country;
        $student->date = $request->date;
        $student->description = $request->description;
        $student->image = $img;
        $student->class_id = $request->class_id;
        $student->save();
        return redirect(route('index'))->with('msg','Student Added Successfully.');

    }

    public function edit($id){
        //dd($id->all());
        $students = Student::find($id);
        $studentClass = StudentClass::all();
        //dd($students->all());

        return view('admin.layouts.pages.edit',compact('students','studentClass'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[

            'name'  =>     'required',
            'email'  =>     'required',
            'phone'  =>     'required',
            'district'  =>     'required',
            'country'  =>     'required',
            'date'  =>     'required'
            

        ]);
        if($request->hasFile('student_image')){
            $image = $request->file('student_image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/student/' .$img);
            Image::make($image)->save($location);
        }
        $student =  Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->district = $request->district;
        $student->country = $request->country;
        $student->date = $request->date;
        $student->description = $request->description;
        $student->image = $img;
        $student->class_id = $request->class_id;
        $student->save();
        return redirect(route('index'))->with('msg','Student Added Successfully.');



   
    
}
    public function delete($id){

        $student = Student::find($id);
        if(!is_null($student)){

            $student->delete();
            return redirect()->back()->with('msg','Student Has Deleted Successfully');
        }else{

            return redirect()->back()->with('msg','There is no dada');
        }
    }

 ////Loign Process

    public function login(){

        return view('login');
    }

    public function loginProcess(Request $request){

        $login = $request->only('email', 'password');

        if (Auth::attempt($login)) {
            // Authentication passed...
            return redirect(route('home'));
    }else{

        return redirect()->back()->with('msg','Your Cretential is Invalied');
    }



    }
    public function logout(){

        Auth::logout();
        return redirect(route('login'));
    }

    public function setting(){

        

        return view('admin.setting.setting')->with('user',auth()->user());
    }

  
   
}