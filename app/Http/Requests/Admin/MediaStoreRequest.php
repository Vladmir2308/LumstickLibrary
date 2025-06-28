<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MediaStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'media_link' => 'required|file',
            'media_type' => 'required|in:video,audio,pdf',
            'media_title' => 'required|string',
            'media_description' => 'required|string',
            'age_from' => '',
            'age_to' => '',
            'gender' => '',
            'media_preview' => 'required|file',

        ];
    }

    public function messages()
    {
        return [
            'media_type.required' => 'Необходимо выбрать файл',
            'media_title.required' => 'Необходимо указать заголовок для видео',
            'media_description.required' => 'Необходимо указать описание для видео',
            'media_preview.required' => 'Необходимо выбрать превью',
        ];
    }
}
