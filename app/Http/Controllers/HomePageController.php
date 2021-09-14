<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Feature;
use App\Models\MasterService;
use App\Models\OurClient;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(Request $request)
    {

        $aboutUs = AboutUs::with('media')->where('status', 1)->get();

        $aboutUsData = [];

        foreach ($aboutUs as $about) {

            $data = [
                'id' => $about->id,
                'title' => $about->title,
                'description' => $about->description,
                'image_ur' => $about->media->isNotEmpty() ? $about->media->last()->getFullUrl() : NULL,
            ];

            array_push($aboutUsData, $data);
        }

        // return $aboutUsData;

        $servicesData = [];
        $services = MasterService::with('media')->where('status', 1)->get();

        foreach ($services as $service) {

            $data = [
                'id' => $service->id,
                'name' => $service->name,
                'description' => $service->description,
                'image_url' => $service->media->isNotEmpty() ? $service->media->last()->getFullUrl() : NULL,
            ];

            array_push($servicesData, $data);
        }

        //return $servicesData;

        $featuresData = [];
        $features = Feature::where('status', 1)->get();

        foreach ($features as $feature) {

            $data = [
                'id' => $feature->id,
                'name' => $feature->name,
            ];

            array_push($featuresData, $data);
        }

        //return $featuresData;

        $ourClientData = [];
        $ourClients = OurClient::with('media')->where('status', 1)->get();
        foreach ($ourClients as $client) {
            $data = [
                'id' => $client->id,
                'name' => $client->name,
                'image_url' => $client->media->isNotEmpty() ? $client->media->last()->getFullUrl() : NULL,

            ];

            array_push($ourClientData, $data);
        }

        // return $ourClientData;

        return view("main/index",compact('aboutUsData','servicesData','featuresData','ourClientData'));

    }
}
