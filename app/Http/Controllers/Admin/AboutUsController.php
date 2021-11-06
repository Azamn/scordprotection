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

        $aboutUsData = [];

        foreach($aboutUs as $about){
            $data = [
                'id' => $about->id,
                'title' => $about->title,
                'description' => $about->description,
                'status' => $about->status,
            ];
            array_push($aboutUsData, $data);
        }

        return view('admin.AboutUs.aboutus',compact('aboutUsData'));

        // return response()->json(['status' => true, 'data' => AboutUsResource::collection($aboutUs)]);

    }

    public function create(Request $request){

        $rules = [
            'name' => 'required|string|regex:/^[a-zA-Z ]*$/|max:30',
            'description' => 'required|string',
            // 'image' => 'sometimes|required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {

            $aboutUs = new AboutUs();
            $aboutUs->title = $request->name;
            $aboutUs->description = $request->description;
            $aboutUs->status = 1;

            if($request->has('image')){
                $aboutUs->addMediaFromRequest('image')->toMediaCollection('about-us');
            }

            $aboutUs->save();

            return response()->json(['status' => true, 'message' => 'About US Added Successfully.!']);
        }

    }

    public function delete(Request $request)
    {

        $aboutUs = AboutUs::where('id', $request->aboutus_id)->first();

        if ($aboutUs) {
            $aboutUs->delete();
            return response()->json(['status' => true, 'message' => 'About-us Deleted Successfully.']);
        }
    }

    public function changeAboutUsStatus(Request $request){

        $aboutUs = AboutUs::where('id', $request->aboutus_id)->first();
        if($aboutUs){
            $aboutUs->status = !$aboutUs->status;
            $aboutUs->save();
            return response()->json(['status' => true, 'message' => 'Status Updated Successfully.']);
        }

    }

}
