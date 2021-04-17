<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Divison;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function createDistrict(){

        $district = District::orderBy('name','asc')->get();
        $division = Divison::orderBy('priority','asc')->get();
        return view('admin.layouts.district.create',compact('district','division'));
    }

    public function storeDistrict(Request $request){

        $this->validate($request,[

            'name'  =>  'required',
            'division_id' => 'required'
        ]);
        $district = new District();
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->description = $request->description;
        $district->save();
        return redirect()->back()->with('msg','District Has Added Successfully');
     }

     public function editDistrict($id){

        $district = District::find($id);
        $division = Divison::orderBy('priority','asc')->get();
        return view('admin.layouts.district.edit',compact('district','division'));


     }


     public function updateDistrict(Request $request ,$id){

        $this->validate($request,[

            'name'  =>  'required',
            'division_id' => 'required'
        ]);
        $district =  District::find($id);
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->description = $request->description;
        $district->save();
        return redirect(route('district.create'))->with('msg','District Has Updated Successfully');
     }
     public function deleteDistrict($id){

        $district = District::find($id);
        if(!is_null($district)){

            $district->delete();
            return redirect()->back()->with('msg','District Has Delete Successfully');
        }else{

            return redirect()->back()->with('msg','There is no Data');
        }
     }
}
