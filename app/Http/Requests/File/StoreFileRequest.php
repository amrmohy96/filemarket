<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFileRequest extends FormRequest
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
     * Get data to be validated from the request.
     *
     * @return array
     */
    public function validationData(): array
    {
        $this->merge(['uploads' => $this->file->id]);
        return $this->all();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'overview_short' => 'required|max:300',
            'overview' => 'required|max:5000',
            'price' => 'required|numeric',
            'uploads' => [
                'required',
                Rule::exists('uploads', 'file_id')->where(function ($q) {
                    $q->whereNull('deleted_at');
                })
            ]
        ];
    }

    public function messages()
    {
        return [
            'uploads.exists' => 'please upload at least one file.!'
        ];
    }
}
