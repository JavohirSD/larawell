<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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

        return [
            $username => 'required|string|min:5|max:255',
            $password => 'required|string|min:6|max:255'
        ];
    }
}
