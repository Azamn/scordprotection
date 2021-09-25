<?php

namespace App\Http\Controllers;

use App\Models\MasterFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{

    public function getAll(Request $request){


    }

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:50',
            'message' => 'sometimes|required|string'
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
