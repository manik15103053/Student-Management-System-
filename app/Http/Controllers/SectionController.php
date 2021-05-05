<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    public function createSection(){

        $sections = Section::orderBy('name','desc')->get();
        $user = Auth::user();
        return view('admin.layouts.section.create',compact('sections','user'));
    }
    public function storeSection(Request $request){

        $this->validate($request,[

            'name'  => 'required',
            'description'  => 'required'
            
        ]);

        $section = new Section();
        $section->name = $request->name;
        $section->description = $request->description;
        $section->save();

        return redirect()->back()->with('msg','Section Has Added Successfully');
  
    }

    public function editSection($id){


        $section = Section::find($id);
        $user = Auth::user();

        return view('admin.layouts.section.edit',compact('section','user'));
    }

    public function updateSecion(Request $request ,$id){

        $this->validate($request,[

            'name'  => 'required',
            'description'  => 'required'
            
        ]);

        $section =  Section::find($id);
        $section->name = $request->name;
        $section->description = $request->description;
        $section->save();

        return redirect(route('section.create'))->with('msg','Section Has Updated Successfully');
  
    }

    public function deleteSection($id){

        $section = Section::find($id);
        if(!is_null($section)){


            $section->delete();
            return redirect(route('section.create'))->with('msg','Section Has Deleted Successfully.');
        }else{

            return redirect()->back()->with('msg','There is no Data available');
        }
    }
}
