<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration');
    }

    public function registration(Request $request)
    {
        // try {
            $inputData = $request->all();
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|min:4',
                'email' => 'required|string|unique:users',
                'phone' => 'required|string|min:11|regex:/(01)[0-9]{9}/',
            ]);
     
            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            if ($user->save())
            {
                // Mail
                $details = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ];
                Mail::to($request->email)->send(new \App\Mail\RegisterConfirmMail($details));
            }
            return back()->with('success','User Registration successfully!');
        // } catch (\Exception $e) {
        //     return redirect()->back()
        //         ->withErrors($e->getMessage())
        //         ->withInput($request->all);
        // }
    }
}
