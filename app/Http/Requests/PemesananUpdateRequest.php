<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemesananUpdateRequest extends FormRequest
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
            'tanggal_pemesanan' => ['required', 'date'],
            'jam_mulai' => ['required', 'date_format:H:i:s'],
            'jam_selesai' => ['required', 'date_format:H:i:s'],
            'nama_pemesan' => ['required', 'max:255', 'string'],
            'jumlah_pelanggan' => ['required', 'numeric'],
            'meja_id' => ['required', 'exists:mejas,id'],
        ];
    }
}
