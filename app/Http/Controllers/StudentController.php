<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Result;
use App\Models\Divison;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\District;
use Illuminate\Support\Str;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;




class StudentController extends Controller
{
    public function home(){

        $students = Student::all();
        
        $studentClass = StudentClass::all();
        $teacher = Teacher::all();
        $section = Section::all();
        //dd($studentClass->all());
        $result = Result::all();
        $user = Auth::user();
       
        return view('admin.layouts.pages.home',compact('students','studentClass',
            'teacher','section','result','user'
    ));
    }

    public function index(Request $request){

        $studentClass = StudentClass::all();
        $students = Student::all();
        $students = Student::where('class_id',$request->class_id)->get();
        $user = Auth::user();

        return view('admin.layouts.pages.index',compact('studentClass','students','user'));
    }
    public function create(){

        $studentClass = StudentClass::orderBy('id','desc')->get();
        $section = Section::orderBy('id','asc')->get();
        $teacher = Teacher::orderBy('id','desc')->get();
        $division = Divison::orderBY('priority','asc')->get();
        $district = District::orderBy('name','asc')->get();

        return view('admin.layouts.pages.create',compact('studentClass',
        'section','teacher','division','district'
    ));
    }

    public function store(Request $request){
        $this->validate($request,[

            'name'  =>     'required',
            'email'  =>     'required',
            'phone'  =>     'required',
            'class_id'  =>     'required',
            'section_id'  =>     'required',
            'teacher_id'  =>     'required',
            'division_id'  =>     'required',
            'district_id'  =>     'required',
            'date'  =>     'required',
            'description'  =>     'required'
            

        ]);
        $student =  new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->class_id = $request->class_id;
        $student->section_id = $request->section_id;
        $student->teacher_id = $request->teacher_id;
        $student->division_id = $request->division_id;
        $student->district_id = $request->district_id;
        $student->date = $request->date;
        $student->description = $request->description;
      if($request->hasFile('image')){
       
          $image = $request->file('image');
          $img = time().'.'.$image->getClientOriginalExtension();
          $location = public_path('/images/student'.$img);
          Image::make($image)->save($location);
          $student->image = $img;
        }
        $student->save();
        return redirect(route('index'))->with('msg','Student Added Successfully.');

    }

    public function edit($id){
        //dd($id->all());
        $students = Student::find($id);
        $studentClass = StudentClass::orderBy('id','desc')->get();
        $section = Section::orderBy('id','asc')->get();
        $teacher = Teacher::orderBy('id','desc')->get();
        $division = Divison::orderBY('priority','asc')->get();
        $district = District::orderBy('name','asc')->get();
        $user = Auth::user();
        //dd($students->all());

        return view('admin.layouts.pages.edit',compact('students','studentClass'
        ,'section','teacher','division','district','user'
    ));
    }

    public function update(Request $request,$id){
        $this->validate($request,[

            'name'  =>     'required',
            'email'  =>     'required',
            'phone'  =>     'required',
            'class_id'  =>     'required',
            'section_id'  =>     'required',
            'teacher_id'  =>     'required',
            'division_id'  =>     'required',
            'district_id'  =>     'required',
            'date'  =>     'required',
            'description'  =>     'required'
            

        ]);
        $student =  Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->class_id = $request->class_id;
        $student->section_id = $request->section_id;
        $student->teacher_id = $request->teacher_id;
        $student->division_id = $request->division_id;
        $student->district_id = $request->district_id;
        $student->date = $request->date;
        $student->description = $request->description;
      if($request->hasFile('image')){
          if(File::exists('/images/student',$student->image)){
              File::delete('/images/student',$student->image);
          }
          $image = $request->file('image');
          $img = time().'.'.$image->getClientOriginalExtension();
          $location = public_path('/images/student'.$img);
          Image::make($image)->save($location);
          $student->image = $img;

      }
      $student->save();
      return redirect(route('index'))->with('msg','Student Has Updated Successfully');



   
       
}
    public function delete($id){

        $student = Student::find($id);
        if(!is_null($student)){
            if(File::exists('/images/student',$student->image)){
                File::delete('/images/student',$student->image);
            }

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

        $user = Auth::user();

        return view('admin.setting.setting',compact('user'));
    }
    public function updateProfile(Request $request){

        $this->validate($request,[

            'username'  => 'required',
            'email'     => 'required'
            
        ]);
        $user = Auth::user();
        $user->username = $request->username;
        $user->email    = $request->email;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/user/'.$img);
            Image::make($image)->save($location);
            $user->image = $img;
         }
            $user->save();
        return redirect()->back()->with('msg','User Updated Successfully.');

             
          
        
       

        
        
    }

  
   
}