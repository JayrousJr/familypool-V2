<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Mail\MessageEmail;
use Illuminate\Http\Request;
use App\Mail\MessageEmailFeedback;
use App\Mail\MessageReceived;
use App\Mail\MessageSent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    function message(Request $request)
    {

        if (Auth::check()) {
            $rules = [
                'name' => ['required', 'string', 'max:30'],
                'subject' => ['required', 'string', 'max:255', 'min:2'],
                'email' => ['required', 'string', 'max:255', 'email'],
                'message' => ['required', 'string', 'max:1000', 'min:3'],
            ];
            //creating a validator instance
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect('/contact#next-section')->withErrors($validator)->withInput();
            } else {

                $formData = new Message();
                $formData->name = request()->name;
                $formData->subject = request()->subject;
                $formData->message = request()->message;
                $formData->user_id = request()->user_id;
                $formData->email = request()->email;

                $formData->save();

                session()->flash('message', 'Thanks for Contacting Family Pool Service, Your Message was Sent Successiful!');

                $mailto = 'info@thefamilypool.com';

                // Email sending
                Mail::to($mailto)->send(new MessageSent($formData));
                Mail::to($formData->email)->send(new MessageReceived($formData));
                return redirect('/contact#notification');
            }
        } else {
            return redirect()->route('register');
        }
    }
}
