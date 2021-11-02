<?php

namespace App\Http\Controllers;

use App\Models\MasterFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{

    public function getAll(Request $request){

        $feedbacks = MasterFeedback::get();

        $allFeedback = [];

        foreach($feedbacks as $feedback){

            $data = [
                'id' => $feedback->id,
                'name' => $feedback->name,
                'message' => $feedback->message,
                'status' => $feedback->status,
            ];

            array_push($allFeedback, $data);
        }

        //return $allFeedback;

        return view("admin.User.feedback",compact('allFeedback'));

    }

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:50',
            'message' => 'required|string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {

            $feedback = new MasterFeedback();
            $feedback->name = $request->name;
            $feedback->message = $request->message;

            $feedback->save();

            return response()->json(['status' => true, 'message' => 'Your Feedback Successfully Added.']);
        }
    }
}
