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
        return response()->json(['status' => true, 'data' => FeatureResource::collection($features)]);
    }

    public function create(Request $request){

        $rules = [
            'name' => 'required|string|regex:/^[a-zA-Z ]*$/|max:30',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {

           $features = new Feature();
           $features->name = $request->name;
           $features->status = 1;

           $features->save();
        }

    }

}
