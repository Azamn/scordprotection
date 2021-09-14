<?php

namespace App\Http\Controllers\Admin;

use App\Models\OurClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OurClientResource;
use Illuminate\Support\Facades\Validator;

class OurClietsController extends Controller
{


    public function getAll(Request $request){

        $ourClients = OurClient::with('media')->get();
        return response()->json(['status' => true, 'data' => OurClientResource::collection($ourClients)]);

    }

    public function create(Request $request){

        $rules = [
            'name' => 'required|string|regex:/^[a-zA-Z ]*$/|max:30',
            'description' => 'sometimes|required|string',
            'image' => 'sometimes|required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {

            $ourClient = new OurClient();
            $ourClient->name = $request->name;
            $ourClient->description = $request->description;
            $ourClient->status = 1;

            if($request->has('image')){
                $ourClient->addMediaFromRequest('image')->toMediaCollection('our-client');
            }

            $ourClient->save();

            return response()->json(['status' => true, 'message' => 'Client Details Added Successfully.!']);

        }

    }

}
