<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieFormRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:255',
            'genre_code' => 'required|string',
            'year' => 'required|integer|between:1,3',
            'poster_filename' => 'sometimes|image|mimes:png|max:4096',
            'synopsis' => 'required|string',
            'trailer_url' => 'sometimes|string',
        ];
        
        return $rules;
    }

    
}
