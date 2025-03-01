<?php

namespace App\Http\Controllers;


use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ServiceCustomerRequest;
use App\Mail\ServiceFeedback;
use App\Mail\ServiceReply;
use App\Mail\ServiceRequeseCustomer;
use App\Mail\ServiceSent;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ServiceRequestController extends Controller
{
    function request(Request  $request): RedirectResponse
    {


        try {
            $rule = [
                'name' => 'required|string|min:5|max:50',
                'zip' => 'required',
                'email' => 'required|email|min:5|max:50',
                'phone' => 'required|string|min:5|max:50',
                'service' => 'required', // Ensure at least one checkbox is selected
                'description' => 'required|string|min:10',
            ];
            $validator = Validator::make($request->all(), $rule);
            if ($validator->fails()) {
                return redirect()->route('askservice')->withErrors($validator)->withInput();
            }
            DB::beginTransaction();
            $validated = $validator->validated();
            $serviceRequest = new ServiceRequest();

            $serviceRequest->name = $request->input('name');
            $serviceRequest->email = $request->input('email');
            $serviceRequest->phone = $request->input('phone');
            $serviceRequest->service = $request->input('service');
            $serviceRequest->zip = $request->input('zip');
            $serviceRequest->description = ($request->input('description'));

            $serviceRequest->save();
            $amani = "familypoolservice2020@gmail.com";
            $mailto = "familypoolservice2020@gmail.com";
            Mail::to($mailto)->send(new ServiceSent($serviceRequest));
            // Mail::to($mailto)->cc($amani)->send(new ServiceSent($serviceRequest));
            Mail::to($serviceRequest->email)->cc($amani)->send(new ServiceReply($serviceRequest));

            DB::commit();

            session()->flash('message', 'You have Successiful applied for the service');
            return redirect('/');
        } catch (ValidationException $e) {
            session()->flash('message', 'Sorry an error occured');
            return redirect()->route('/service-request')->withErrors($e->validator)->withInput();
        }
    }
}
