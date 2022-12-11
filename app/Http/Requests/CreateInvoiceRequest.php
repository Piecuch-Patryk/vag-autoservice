<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'number' => 'required|number',
            'make' => 'required',
            'model' => 'required',
            'registration' => 'required',
            'vin' => 'required',
            'milage' => 'required',
            'jobs' => 'required',
            'parts' => 'required',
        ];
    }
}
