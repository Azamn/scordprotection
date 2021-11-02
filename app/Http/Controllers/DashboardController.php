<?php

namespace App\Http\Controllers;

use App\Models\GetInTouch;
use App\Models\MasterFeedback;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function dashboardPage(Request $request){

        $getIntouch = GetInTouch::get();

        $feedback = MasterFeedback::get();

        $totalrequestCount = 0;
        $pendingRequestCount = 0;
        $completedRequestCount = 0;
        $feedBackCount = 0;

        $totalrequestCount = $getIntouch->count();
        $pendingRequestCount = $getIntouch->where('status',0)->count();
        $completedRequestCount = $getIntouch->where('status',1)->count();

        $feedBackCount = $feedback->count();

        return view('admin.dashboard',compact('totalrequestCount','pendingRequestCount','completedRequestCount','feedBackCount'));


    }

}
