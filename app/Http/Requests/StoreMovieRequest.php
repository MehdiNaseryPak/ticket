<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'required|mimes:jpg,bmp,png,webp',
            'background' => 'required|mimes:jpg,bmp,png,webp',
            'trailer' => 'required|mimetypes:video/avi,video/mp4,video/mpeg,video/quicktime',
            'genre' => 'required',
            'director' => 'required',
            'time' => 'required',
            'description' => 'required',
        ];
    }
}
