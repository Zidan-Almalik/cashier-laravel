<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'nama_menu' => ['required', 'max:255', 'string'],
            'harga' => ['required', 'numeric'],
            'deskripsi' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'jenis_id' => ['required', 'exists:jenis,id'],
        ];
    }
}
