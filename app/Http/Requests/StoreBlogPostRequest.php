<?php

namespace App\Http\Requests;

use App\Http\Controllers\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\HttpFoundation\Response;

class StoreBlogPostRequest extends FormRequest
{
    public function getId(): object|string|null
    {
        return request()->route('blog');
    }
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
     * Get the validation messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.unique' => 'A title should be unique',
            'description.required' => 'The description field is required',
            'slug.unique' => 'The slug field should be unique'
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'       => 'required|string|min:8|max:128|unique:blog,title,'.$this->getId(),
            'anons'       => 'required|string|min:8|max:255',
            'description' => 'required|string|min:16|max:10000',
            'slug'        => 'min:8|max:128|unique:blog,slug,'.$this->getId(),
            'author_id'   => 'integer|min:1|max:1000',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = ApiResponse::json(null, false,Response::HTTP_UNPROCESSABLE_ENTITY, $validator->errors());
        throw new ValidationException($validator, $response);
    }
}
