<?php

namespace App\Http\Controllers\Admin;

use App\Models\OurClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OurClientResource;
use Illuminate\Support\Facades\Validator;

class OurClietsController extends Controller
{


    public function getAll(Request $request)
    {

        $ourClientData = [];
        $ourClients = OurClient::with('media')->where('status',1)->get();

        foreach($ourClients as $ourClient){
            $data = [
            'id' => $ourClient->id,
            'name' => $ourClient->name,
            'description' => $ourClient->description,
            'image_url' => $ourClient->media->isNotEmpty() ? $ourClient->media->last()->getFullUrl() : NULL,
            'status' => $ourClient->status,
            ];

            array_push($ourClientData, $data);
        }

        return view('admin.Client.client-list', compact('ourClientData'));

        // return response()->json(['status' => true, 'data' => OurClientResource::collection($ourClients)]);
    }

    public function create(Request $request)
    {

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

            if ($request->has('image')) {
                $ourClient->addMediaFromRequest('image')->toMediaCollection('our-client');
            }

            $ourClient->save();

            return response()->json(['status' => true, 'message' => 'Client Details Added Successfully.!']);
        }
    }

    public function getSingle(Request $request, $clientId)
    {

        $ourClients = OurClient::where('id', $clientId)->first();
        if ($ourClients) {
            return response()->json(['status' => true, 'data' => OurClientResource::make($ourClients)]);
        }
    }

    public function update(Request $request, $clientId)
    {

        $rules = [
            'name' => 'sometimes|required|string|regex:/^[a-zA-Z ]*$/|max:30',
            'description' => 'sometimes|required|string',
            'image' => 'sometimes|required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {

            $ourClient = OurClient::where('id', $clientId)->first();

            if ($request->has('name')) {
                $ourClient->name = $request->name;
            }

            if ($request->has('description')) {
                $ourClient->description = $request->description;
            }

            if ($request->has('image')) {
                $ourClient->addMediaFromRequest('image')->toMediaCollection('service');
            }

            $ourClient->update();

            return response()->json(['status' => 'true', 'message' => 'Client Updated Successfully.']);
        }
    }
}
