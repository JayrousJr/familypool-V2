<?php

namespace App\Http\Controllers;


use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ServiceCustomerRequest;
use App\Mail\ServiceFeedback;
use App\Mail\ServiceRequeseCustomer;
use Illuminate\Validation\ValidationException;

class ServiceRequestController extends Controller
{
    function request(ServiceCustomerRequest  $request)
    {

        if (Auth::user()->role === 'User') {
            try {
                $validateData = $request->validated();

                $serviceRequest = new ServiceRequest([
                    'client_id' => $validateData['client_id'],
                    'name' => $validateData['name'],
                    'email' => $validateData['email'],
                    'phone' => $validateData['phone'],
                    'service' => json_encode($validateData['service']),
                    'street' => $validateData['street'],
                    'city' => $validateData['city'],
                    'state' => $validateData['state'],
                    'description' => $validateData['description'],
                ]);

                $serviceRequest->save();

                $mailto = 'admin@familypoolserviceonline.com';
                // Email sending
                Mail::to($mailto)->send(new ServiceFeedback($serviceRequest));
                Mail::to($serviceRequest->email)->send(new ServiceRequeseCustomer($serviceRequest));

                session()->flash('message', 'You have Successiful applied for the service');
                return redirect('/');
            } catch (ValidationException $e) {
                // If validation fails, redirect back to the previous page with errors and the fragment identifier
                return redirect()->route('/service-request')->withErrors($e->validator)->withInput();
            }
        } else {
            session()->flash('error', 'You can not ask for service as you are in the administrative team');
            return redirect('/service-request');
        }
    }
}
