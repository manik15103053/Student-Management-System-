<?php

namespace App\Http\Controllers;

use App\Models\Divison;
use Illuminate\Http\Request;

class DivisonController extends Controller
{
    public function createDivision(){

        $divisions = Divison::orderBy('priority','asc')->get();
        return view('admin.layouts.division.create',compact('divisions'));
    }

    public function storeDivision(Request $request){

        $this->validate($request,[


            'name'   =>  'required',
            'priority' => 'required'
        ]);

        $division  = new Divison();
        $division->name  = $request->name;
        $division->priority  = $request->priority;
        $division->save();
        return redirect()->back()->with('msg','Division Has Added Successfully');


        
    }
    public function divisionEdit($id){

        $division = Divison::find($id);
      

            return view('admin.layouts.division.edit',compact('division'));
        
    }

    public function divisionUpdate(Request $request ,$id){

        $this->validate($request,[


            'name'   =>  'required',
            'priority' =>  'required'
        ]);

        $division  = Divison::find($id);

        $division->name  = $request->name;
        $division->priority = $request->priority;
        $division->save();
        return redirect(route('division.create'))->with('msg','Division Has Updated Successfully');

            
         
    }
    public function divisionDelete($id){

        $division = Divison::find($id);
        if(!is_null($division)){

            $division->delete();
            return redirect()->back()->with('msg','Division Has Delete Successully');
        }else{

            return redirect()->back()->with('msg','There is no data.');
        }
    }
}
