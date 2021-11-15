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
        $serviceData = [];
        $services = MasterService::with('media')->where('status', 1)->get();

        foreach ($services as $service) {
            $data = [
                'id' => $service->id,
                'name' => $service->name,
                'description' => $service->description,
                'image_url' => $service->media->isNotEmpty() ? $service->media->last()->getFullUrl() : NULL,
            ];
            array_push($serviceData, $data);
        }

        return view("admin.Service.service-list", compact('serviceData'));

        // return response()->json(['status' => true, 'data' => ServiceResource::collection($services)]);
    }


    public function create(Request $request)
    {

        $rules = [
            'name' => 'required|string|regex:/^[a-zA-Z ]*$/|max:30',
            'description' => 'required|string',
            'image' => 'required|file'
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
                $service->addMediaFromRequest('image')->toMediaCollection('service');
            }

            $service->save();

            return response()->json(['status' => true, 'message' => 'Service Added Successfully.']);
        }
    }

    public function getSingle(Request $request, MasterService $service)
    {
        // $service = MasterService::where('id', $service->id)->first();
        $service = MasterService::where('id', $service->id)->first();
        $serviceData = [
            'id' => $service->id,
            'name' => $service->name,
            'description' => $service->description,
            'image_url' => $service->media->isNotEmpty() ? $service->media->last()->getFullUrl() : NULL,
        ];

       // return $serviceData;

        return view('main.service', compact('serviceData'));



        // if ($serviceData){

        //     // return response()->json(['status' => true, 'data' => ServiceResource::make($service)]);
        // }
    }

    public function update(Request $request, $serviceId)
    {

        $rules = [
            'name' => 'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'image' => 'sometimes|required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {

            $service = MasterService::where('id', $serviceId)->first();

            if ($request->has('name')) {
                $service->name = $request->name;
            }

            if ($request->has('description')) {
                $service->description = $request->description;
            }

            if ($request->has('image')) {
                $service->addMediaFromRequest('image')->toMediaCollection('service');
            }

            $service->update();

            return response()->json(['status' => true, 'message' => 'Service Updated Successfully.']);
        }
    }

    public function delete(Request $request)
    {
        $service = MasterService::where('id', $request->service_id)->first();
        if ($service) {
            $service->delete();
            return response()->json(['status' => true, 'message' => 'Service Deleted Successfully.']);
        }
    }

    public function getServiceFOrDropdown(Request $request)
    {

        $service = MasterService::where('status', 1)->get();
        return response()->json(['status' => true, 'data' => $service]);
    }
}
