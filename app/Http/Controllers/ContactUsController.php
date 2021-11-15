<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{

    public function create(Request $request)
    {

        $rules = [
            'mobile_no' => 'required|numeric|min:10|max:10',
            'email' => 'required|email',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {

            $contactUs = new ContactUs();
            $contactUs->mobile_no = $request->mobile_no;
            $contactUs->email = $request->email;

            $contactUs->save();

            return response()->json(['status' => true, 'message' => 'Contatc Us Detail Updated Successfully.']);
        }
    }

    public function getContact(Request $request){

        $contact = ContactUs::where('status',1)->first();
        return view('admin.User.contact',compact('contact'));

    }
}
