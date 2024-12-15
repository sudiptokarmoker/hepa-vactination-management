<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;

class CustomerCreateRequest extends FormRequest
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
        $rules =  [
            'first_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'country' => 'required',
            'address_1' => 'required||max:255',
        ];
        return $rules;
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
        [
            'message' => $validator->errors(),
            'isSuccess' => false,
            'data' => [],
            'count' => 0
        ],417
        ));
    }
}
