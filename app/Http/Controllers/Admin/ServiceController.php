<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterService;
use App\Http\Resources\ServiceResource;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{

    public function getAll(Request $request)
    {

        $services = MasterService::with('media')->get();
        return response()->json(['status' => true, 'data' => ServiceResource::collection($services)]);
    }


    public function create(Request $request)
    {

        $rules = [
            'name' => 'required|string|regex:/^[a-zA-Z ]*$/|max:30',
            'description' => 'required|string',
            'image' => 'sometimes|required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {

            $service = new MasterService();
            $service->name = $request->name;
            $service->description = $request->description;
            $service->status = 1;

            if ($request->has('image')) {
                $service->addAllMediaFromRequest('image')->toMediaCollection('service');
            }

            $service->save();
        }
    }
}
