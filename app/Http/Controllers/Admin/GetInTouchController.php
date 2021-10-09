<?php

namespace App\Http\Controllers\Admin;

use App\Models\GetInTouch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\GetInTouchResource;

class GetInTouchController extends Controller
{

    public function getAll(Request $request)
    {

        $getInTouch = GetInTouch::get();

        $customerRequest = [];

        foreach ($getInTouch as $getTouh) {
            $data = [
                'id' => $getTouh->id,
                'name' => $getTouh->name,
                'email' => $getTouh->email,
                'contact' => $getTouh->contact,
                'subject' => $getTouh->subject,
                'message' => $getTouh->message,
                'status' => $getTouh->status,
            ];

            array_push($customerRequest, $data);
        }
        //return $customerRequest;
        //return response()->json(['status' => true, 'data' => GetInTouchResource::collection($getInTouch)]);

        return view("admin.Request.request-list", compact('customerRequest'));
    }

    public function create(Request $request)
    {

        $rules = [
            'name' => 'required|string|regex:/^[a-zA-Z ]*$/|max:30',
            'email' => 'sometimes|required|email:rfc,dns',
            'contact' => 'required|numeric|digits_between:10,10',
            'subject' => 'sometimes|required|string',
            'message' => 'sometimes|required|string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {

            $getInTouch = new GetInTouch();
            $getInTouch->name = $request->name;
            $getInTouch->email = $request->email;
            $getInTouch->contact = $request->contact;
            $getInTouch->subject = $request->subject;
            $getInTouch->message = $request->message;
            $getInTouch->status = 0;

            $getInTouch->save();

            return response()->json(['status' => true, 'message' => 'Your Request Send Successfully.']);
        }
    }

    public function delete(Request $request, $requestId){

        $getInTouch = GetInTouch::where('id',$requestId)->first();
        if($getInTouch){
            $getInTouch->delete();
            return response()->json(['status' => true, 'message' => 'Request Deleted Successfully.']);
        }

    }
}
