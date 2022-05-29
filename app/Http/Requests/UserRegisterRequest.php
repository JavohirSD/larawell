<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $username = env('USERNAME_FIELD');
        $password = env('PASSWORD_FIELD');
        $table = env('USER_TABLE');

        $rules = [
            $username => 'required|string|min:5|max:255',
            $password => 'required|string|min:6|max:255'
        ];

        if(request()->route()->getName() == "Register"){
            $rules[$username] .= '|unique:'.$table.','.$username;
            $rules += ['name' => 'required|string|min:4|max:255'];
        }

        return $rules;
    }
}
