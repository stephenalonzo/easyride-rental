<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservation extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pickup' => 'required',
            'dropoff' => 'required',
            'age' => 'required',
            'vehicle_id' => 'required',
            'name' => 'required',
            'number' => 'required',
            'email' => ['required', 'email'],
            'license_number' => 'required',
            'issuing_state' => 'required',
            'exp_date' => 'required',
            'issue_date' => 'required',
            'dob' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'street_address' => 'required',
            'zip' => 'required',
            'opt_protection' => 'nullable',
            'equipment' => 'nullable'
        ];
    }
}
