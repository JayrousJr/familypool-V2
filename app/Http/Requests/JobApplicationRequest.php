<?php

namespace App\Http\Requests;

use App\Rules\SoscilaSecurityOrEIN;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class JobApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email'],
            'nationality' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'min:3', 'max:6'],
            'gender' => ['required', 'in:Male,Female'],
            'age' => ['required', 'integer', 'between:18,45'],
            'birthdate' => ['required', 'date', 'date_format:Y-m-d'],



            // 'socialsecurity' => ['required', Rule::in(['SSN', 'EIN'])],

            // 'socialsecurityNumber' => [
            //     'nullable',
            //     Rule::requiredIf(function () {
            //         return request('socialsecurity') === 'socialsecurityNumber';
            //     }),
            //     'min:11',
            //     'unique:job_applicants,socialsecurityNumber',
            //     'string',
            //     'max:11',
            // ],

            // 'einNumber' => [
            //     'nullable',
            //     Rule::requiredIf(function () {
            //         return request('socialsecurity') === 'einNumber';
            //     }),
            //     'min:10',
            //     'unique:job_applicants,einNumber',
            //     'string',
            //     'max:10',
            // ],

            // 'socialsecurity' => 'required',
            // 'socialsecurity.*' => 'in:SSN,EIN',
            // 'einNumber' => ['required_if:socialsecurity,EIN', 'nullable', 'min:10', 'unique:job_applicants,einNumber', 'string', 'max:10'],
            // 'socialsecurityNumber' => ['required_if:socialsecurity,SSN', 'nullable', 'min:11', 'unique:job_applicants,socialsecurityNumber', 'string', 'max:11'],

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
            // 'termsChkbx' => 'accepted', // Make sure you have a checkbox with the name "termsChkbx"
        ];
    }
    public function messages()
    {
        return [
            'zip.required' => 'Please Fill in your zip Code',
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
            '' => 'Please Fill in your  Details',
        ];
    }
}
