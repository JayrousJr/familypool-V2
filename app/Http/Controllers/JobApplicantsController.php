<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplicants;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\JobApplicationRequest;
use Illuminate\Validation\ValidationException;

class JobApplicantsController extends Controller
{
    function apply_job(Request $request)

    {

        // dd($request->all());

        if (Auth::check()) {

            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255', 'email', 'unique:job_applicants,email',],
                'nationality' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'state' => ['required', 'string', 'max:255'],
                'street' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'zip' => ['required', 'string', 'min:3', 'max:6'],
                'gender' => ['required', 'in:Male,Female'],
                'age' => ['required', 'integer', 'between:18,45'],
                'birthdate' => ['required', 'date', 'date_format:Y-m-d'],
                'days' => 'required|array|min:2|max:6',
                'days.*' => 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
                'starttime' => ['required', 'string'],
                'endtime' => ['required', 'string'],
                'startdate' => ['required', 'date', 'date_format:Y-m-d'],
                'workperiod' => ['required', 'integer', 'between:3,12'],
                'workHours' => ['required', 'integer', 'between:30,170'],
                'smoke' => 'required',
                'licence' => ['required'],
                'licenceNumber' => ['string', 'max:255', 'min:6'],
                'issueddate' => ['required_if:licence,I have valid license', 'date', 'date_format:Y-m-d'],
                'expiredate' => ['required_if:licence,I have valid license', 'date', 'date_format:Y-m-d'],
                'issuedcity' => ['string', 'max:255'],
                'transport' => 'required|in:I Own transport,I do not own transport',

                'socialsecurity' => ['required', Rule::in(['SSN', 'EIN'])],
                'einNumber' => ['nullable', 'min:10', 'unique:job_applicants,einNumber', 'string', 'max:10'],
                'socialsecurityNumber' => ['nullable', 'min:11', 'unique:job_applicants,socialsecurityNumber', 'string', 'max:11'],
            ];
            $errorMessage = [
                'zip.required' => 'Please Fill in your zip Code.',
                'gender.required' => 'Please fill in the Gender',
                'socialsecurity' => 'Please select the Service you use either SSN or EIN',
                'days.required' => 'You must choose atleast two days of working',
                'nationality.required' => 'Please Fill in your Country',
                'age.required' => 'Please Fill in your age details',
                'birthdate.required' => 'Please Fill in your Birth Date details',
                'workperiod.between' => 'The workperiod field must be between 3 and 12 months',
                'smoke.required' => 'Please Choose whether you smoke or you do not smoke',
                'licence.required' => 'Please Cjoose whether you have a driveing licence or not',
                'transport.required' => 'Please choose whether you have a transport or not',
                'licenceNumber.required' => 'Please Fill in your licence',
                'name.required' => 'Name Field is mandantory, please go to your Profile to set it',
                'state.required' => 'State Field is mandantory, please go to your Profile to set it',
                'street.required' => 'Street Field is mandantory, please go to your Profile to set it',
                'city.required' => 'City Field is mandantory, please go to your Profile to set it',
                'phone.required' => 'Phone Field is mandantory, please go to your Profile to set it',
                'nationality.required' => 'Nationality Field is mandantory, please go to your Profile to set it',
                // '' => 'Please Fill in your  Details',
            ];

            $validator = Validator::make($request->all(), $rules, $errorMessage);


            if ($validator->fails()) {
                return redirect()->route('apply')->withErrors($validator)->withInput();
            } else {

                $application = new JobApplicants();

                $application->name = request()->name;
                $application->email = request()->email;
                $application->nationality = request()->nationality;
                $application->city = request()->city;
                $application->street = request()->street;
                $application->state = request()->state;
                $application->phone = request()->phone;
                $application->age = request()->age;
                $application->zip = request()->zip;
                $application->birthdate = request()->birthdate;
                $application->socialsecurity = request()->socialsecurity;
                // 'years' => $validator['years'],
                $application->einNumber = request()->einNumber;
                $application->socialsecurityNumber = request()->socialsecurityNumber;
                $application->days = json_encode(request()->days);
                $application->starttime = request()->starttime;
                $application->endtime = request()->endtime;
                $application->startdate = request()->startdate;
                $application->workperiod = request()->workperiod;
                $application->workHours = request()->workHours;
                $application->smoke = request()->smoke;
                $application->licence = request()->licence;
                $application->licenceNumber = request()->licenceNumber;
                $application->issueddate = request()->issueddate;
                $application->issuedcity = request()->issuedcity;
                $application->expiredate = request()->expiredate;
                $application->transport = request()->transport;


                $application->save();

                session()->flash('message', 'Your Job application has successiful being sent, we are working on your application and we will come back to you!');
                return redirect('/');
            }
        } else {
            return redirect()->route('register');
        }
    }
}
