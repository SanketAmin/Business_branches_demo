<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Session;

class CreateBranchRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'business_id' => 'required|exists:businesses,id',
            'day' => 'required|array',
            'start_time' => 'required|array',
            'end_time' => 'required|array',
            'day.*' => 'required|exists:days,id',
            'start_time.*' => 'required|date_format:H:i',
            'end_time.*' => 'required|date_format:H:i|after:start_time.*',
        ];
    }


    public function messages(): array
    {
        return [
            'end_time.*.after' => 'Start time must be less then End Time'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Session::flash('error', $validator->errors()->first());
        throw new HttpResponseException(
        redirect()->back()->withErrors($validator)->withInput());
    }
}
