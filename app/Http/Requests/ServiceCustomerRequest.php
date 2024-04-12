<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCustomerRequest extends FormRequest
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
            'client_id' => 'required',
            'name' => 'required',
            'state' => 'required',
            'city' => 'required',
            'street' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'service' => 'required|array|min:1', // Ensure at least one checkbox is selected
            'service.*' => 'in:Pool Maintenance,Chemical Balancing,Pool Opening,Pool Equipment Repairs,Pool Closing & Winterizing,Pool Drain & Pressure Washing,Pool Cleaning',
            'description' => 'required|string|min:50',
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Please describe the service you require from us clearly atleast 100 characters ',
            'service.required' => 'Please select the Cleck boxes below for atleast one service you require.',
            'email.email' => 'Please enter a valid email address. Go to your Profile to set The',
            'name.required' => 'Name Field is mandantory, please go to your Profile to set it',
            'state.required' => 'State Field is mandantory, please go to your Profile to set it',
            'street.required' => 'Street Field is mandantory, please go to your Profile to set it',
            'city.required' => 'City Field is mandantory, please go to your Profile to set it',
            'phone.required' => 'Phone Field is mandantory, please go to your Profile to set it',
            'nationality.required' => 'Nationality Field is mandantory, please go to your Profile to set it',
            // Add more custom messages as needed
        ];
    }
}
