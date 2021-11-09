<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FeatureResource;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
{

    public function getAll(Request $request){

        $features = Feature::get();

        $facilitiesData = [];

        foreach($features as $feature){
            $data = [
                'id' => $feature->id,
                'name' => $feature->name,
                'status' => $feature->status,
            ];

            array_push($facilitiesData, $data);
        }

        return view('admin.Facilities.facilities',compact('facilitiesData'));

        // return response()->json(['status' => true, 'data' => FeatureResource::collection($features)]);
    }

    public function create(Request $request){

        $rules = [
            'name' => 'required|string|regex:/^[a-zA-Z ].*$/|',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {

           $features = new Feature();
           $features->name = $request->name;
           $features->status = 1;

           $features->save();

           return response()->json(['status' => true, 'message' => 'Feature Added Successfully.']);
        }

    }

    public function delete(Request $request)
    {

        $feature = Feature::where('id', $request->feature_id)->first();

        if ($feature) {
            $feature->delete();
            return response()->json(['status' => true, 'message' => 'Feature Data Deleted Successfully.']);
        }
    }

    public function changeFeatureStatus(Request $request){

        $feature = Feature::where('id', $request->feature_id)->first();
        if($feature){
            $feature->status = !$feature->status;
            $feature->save();
            return response()->json(['status' => true, 'message' => 'Status Updated Successfully.']);
        }

    }

}
