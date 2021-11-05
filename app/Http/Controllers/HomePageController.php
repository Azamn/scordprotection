<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Feature;
use App\Models\MasterFeedback;
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

        //return $aboutUs;

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

        $feedBackData = [];
        $feedbacks = MasterFeedback::where('status',1)->get();
        foreach($feedbacks as $feedback){
            $data = [
                'id' => $feedback->id,
                'name' => $feedback->name,
                'message' => $feedback->message,
            ];

            array_push($feedBackData, $data);
        }

        //return $ourClientData;

        return view("main.index", compact('aboutUsData', 'servicesData', 'featuresData', 'ourClientData','feedBackData'));
    }

    public function ourClientsView(Request $request)
    {

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

        return view("main.clients", compact('ourClientData'));
    }
}
