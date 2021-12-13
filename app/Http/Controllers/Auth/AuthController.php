<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Admin\PasswordChangeEmail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required|min:8',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {
            //            $userExists = User::where('email', $request->email)->exists();
            //            if (!$userExists) {
            //                return response()->json(['status' => false, 'message' => 'User does not exists with this email address.']);
            //            } else
            //                {
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            $user = User::where('email', $request->email)->first();

            $isValidUser = Auth::attempt($credentials);

            if (!$isValidUser) {

                return response()->json([
                    'status' => false,
                    'message' => 'Wrong Credentials! try again',
                    'user_type' => null,
                    'api_token' => '',

                ]);
            } else {

                $token = $user->createToken('scord-protection')->plainTextToken;

                return response()->json([
                    'user_id' => $user->id,
                    'status' => true,
                    'message' => 'Successfully Logged In!',
                    'api_token' => $token,
                    'name' => $user->first_name,
                    'email' => $user->email,
                    'email_verified' => is_null($user->email_verified_at) ? 0 : 1,

                ]);
            }
        }
        //        }
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        $user = auth()->user();
        if ($user) {
            $user->remember_token = NULL;
            $user->update();
            return response()->json(['status' => true, 'message' => 'Logged Out Successfully !']);
        } else {
            return response()->json(['status' => false, 'message' => 'Unauthorized User']);
        }
    }


    public function forgotPasswordRequest(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:users,email',
        ];

        $messages = [
            'email.exists' => 'This Email Address Does Not Exist!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {
            $user = User::where('email', $request->email)->first();
            $remember_token = generateRememberToken();

            //            Mail::to($request->email)->send(new PasswordChangeEmail($token, secure($user->name, 'D')));  //TODO : MAIL

            $resetRequest = new PasswordReset();
            $resetRequest->user_id = $user->id;
            $resetRequest->token = $remember_token;
            $resetRequest->save();

            return response()->json(['status' => true, 'message' => 'Password Reset Mail Send Successfully!']);
        }
    }

    public function verifyPasswordRequest(Request $request)
    {
        $rules = [
            'token' => 'required|exists:password_resets,token',
        ];

        $data = [
            'token' => $request->token,
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {
            $passwordReset = PasswordReset::where('token', $request->token)->first();
            $passwordReset->verified_at = now();
            $passwordReset->update();

            return response()->json(['status' => true, 'message' => 'Token validation done !']);
        }
    }

    public function setNewPassword(Request $request)
    {
        $rules = [
            'token' => 'required|exists:password_resets,token',
            'password' => 'required|min:8|regex:"^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})"'
        ];

        $message = array(
            'regex' => 'The :new_password Should have at least 1 lowercase AND 1 uppercase AND 1 number AND 1 symbol'
        );

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {
            $resetPassword = PasswordReset::where('token', $request->token)->first();

            $user = User::where('id', $resetPassword->user_id)->first();

            if (Hash::check($user->password, $request->password)) {
                return response()->json(['status' => false, 'message' => 'Please enter another password this password is matches of your old password.']);
            } else {
                $user->password = Hash::make($request->password);
                $user->save();
                return response()->json(['status' => true, 'message' => 'Password Successfully Updated.']);
            }
        }
    }

    public function changePassword(Request $request)
    {
        $rules = [
            'old_password' => 'required',
            //            'new_password' => 'required|min:8|regex:"^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})"',
            'new_password' => 'required|min:8',
        ];

        $message = array(
            'regex' => 'The :new_password Should have at least 1 lowercase AND 1 uppercase AND 1 number AND 1 symbol'
        );

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {
            $user = auth()->user();

            if (!Hash::check($request->old_password, $user->password)) {
                return response()->json(['status' => false, 'message' => 'Old Password Does not Match Try Again.']);
            } else {
                if (Hash::check($request->new_password, $user->password)) {
                    return response()->json(['status' => false, 'message' => 'Please enter another password this password is matches with your current password.']);
                } else {
                    $user->password = Hash::make($request->new_password);
                    $user->save();
                    return response()->json(['status' => true, 'message' => 'Password Successfully Changed!']);
                }
            }
        }
    }
}
