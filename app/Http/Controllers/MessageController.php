<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Mail\MessageEmail;
use Illuminate\Http\Request;
use App\Mail\MessageEmailFeedback;
use App\Mail\MessageReceived;
use App\Mail\MessageSent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    function message(Request $request)
    {
        try {
            DB::beginTransaction();
            $rules = [
                'name' => ['required', 'string', 'max:30'],
                'subject' => ['required', 'string', 'max:255', 'min:2'],
                'email' => ['required', 'string', 'max:255', 'email'],
                'message' => ['required', 'string', 'max:1000', 'min:3'],
            ];
            //creating a validator instance
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect('/contact#section')->withErrors($validator)->withInput();
            } else {
                $formData = new Message();
                $formData->name = request()->name;
                $formData->subject = request()->subject;
                $formData->message = request()->message;
                $formData->email = request()->email;

                $formData->save();
                session()->flash('message', 'Thanks for Contacting Family Pool Service, Your Message was Sent Successiful!');

                $amani = "familypoolservice2020@gmail.com";
                $mailto = "familypoolservice2020@gmail.com";
                // Email sending
                Mail::to($mailto)->cc("joshuajayrous@gmail.com")->send(new MessageSent($formData));
                Mail::to($formData->email)->send(new MessageReceived($formData));
                DB::commit();
                return redirect('/');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            // session()->flash('error', 'There was an error please try again after a moment ' . $th->getMessage());
            return redirect('/');
        }
    }
}
