<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ManufacturerUpdateRequest extends FormRequest
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
    public function getId()
    {
        return $this->route('id');
    }
    public function rules(): array
    {
        $id = $this->route('manufacturer');
        return [
            'manufacturer_name' => 'required|string|max:255|unique:manufacturers,manufacturer_name,'.$id
        ];
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
