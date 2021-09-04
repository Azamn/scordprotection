<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutUsResource;
use Illuminate\Support\Facades\Validator;

class AboutUsController extends Controller
{

    public function getAll(Request $request){

        $aboutUs = AboutUs::with('media')->get();
        return response()->json(['status' => true, 'data' => AboutUsResource::collection($aboutUs)]);

    }

    public function create(Request $request){

        $rules = [
            'title' => 'required|string|regex:/^[a-zA-Z ]*$/|max:30',
            'description' => 'required|string',
            'image' => 'sometimes|required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {

            $aboutUs = new AboutUs();
            $aboutUs->title = $request->title;
            $aboutUs->description = $request->description;
            $aboutUs->status = 1;

            if($request->has('image')){
                $aboutUs->addMediaFromRequest('image')->toMediaCollection('about-us');
            }

            $aboutUs->save();

            return response()->json(['status' => true, 'message' => 'About US Added Successfully.!']);
        }

    }

}
