<?php

namespace App\Http\Controllers;

use App\Models\Divison;
use App\Models\Teacher;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
    public function createTeacher(){

        $teachers = Teacher::orderBy('name','asc')->get();
        $division = Divison::orderBy('priority','asc')->get();
        $district = District::orderBy('name','asc')->get();
        $user = Auth::user();
        return view('admin.layouts.teacher.create',compact('teachers','division','district','user'));
    }

    public function storeTeacher(Request $request){

        $this->validate($request,[


            'name'    =>  'required',
            'email'    =>  'required',
            'phone'    =>  'required',
            'division_id'    =>  'required',
            'district_id'    =>  'required',
            
        ]);

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->division_id = $request->division_id;
        $teacher->district_id = $request->district_id;
        $teacher->description = $request->description;

       if($request->hasFile('image')){

        $image = $request->file('image');
        $img = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('images/teacher/'.$img);
        Image::make($image)->save($location);
        ///Import top  : use Intervention\Image\Facades\Image;
        $teacher->image  = $img;
       }
       $teacher->save();
       return redirect()->back()->with('msg','Teacher Has Added Successfully');
    }

    public function editTeacher($id){

        $teacher  = Teacher::find($id);
        $division = Divison::orderBy('priority','asc')->get();
        $district = District::orderBy('name','asc')->get();
        $user = Auth::user();

        return view('admin.layouts.teacher.edit',compact('teacher','division','district','user'));
    }

    public function updateTeacher(Request $request ,$id){

        $this->validate($request,[


            'name'    =>  'required',
            'email'    =>  'required',
            'phone'    =>  'required',
            'division_id'    =>  'required',
            'district_id'    =>  'required',
            
        ]);

        $teacher =  Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->division_id = $request->division_id;
        $teacher->district_id = $request->district_id;
        $teacher->description = $request->description;

       if($request->hasFile('image')){
           if(File::exists('/images/teacher',$teacher->image));
           File::delete('/images/teacher',$teacher->image);

        $image = $request->file('image');
        $img = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('images/teacher/'.$img);
        Image::make($image)->save($location);
        ///Import top  : use Intervention\Image\Facades\Image;
        $teacher->image  = $img;
       }
       $teacher->save();
       return redirect(route('teacher.create'))->with('msg','Teacher Has Updated Successfully');
    }
    public function deleteTeacher($id){

        $teacher = Teacher::find($id);
        if(!is_null($teacher)){
            if(File::exists('/images/teacher',$teacher->image)){
                File::delete('/images/teacher',$teacher->image);

            }
        }
        $teacher->delete();
        return redirect(route('teacher.create'))->with('msg','Teacher Has Deleted Successfully.');

    }
}
