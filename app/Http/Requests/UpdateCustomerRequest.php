<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'nama_pelanggan' => 'string',
            'perusahaan' => 'string',
            'alamat' => 'string',
            'nomor_telepon' => 'string',
            'validasi_ktp' => 'boolean',
            'tanggal_validasi_ktp' => 'date'
        ];
    }
}
