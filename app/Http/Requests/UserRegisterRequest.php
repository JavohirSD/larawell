<?php

namespace App\Http\Requests;

use App\Http\Controllers\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $username = config('services.custom.username_field');
        $password = config('services.custom.password_field');
        $table = config('services.custom.user_table');

        return [
            'email'   => 'required|string|email|max:255|unique:'.$table.','.'email',
            'name'    => 'required|string|min:4|max:255',
            $username => 'required|string|min:5|max:255|unique:'.$table.','.$username,
            $password => 'required|string|min:6|max:255',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = ApiResponse::json(null, false,Response::HTTP_UNPROCESSABLE_ENTITY, $validator->errors());
        throw new ValidationException($validator, $response);
    }
}
