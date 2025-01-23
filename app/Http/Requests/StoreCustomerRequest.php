<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'nama_pelanggan' => 'required|string',
            'perusahaan' => 'required|string',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string',
            'validasi_ktp' => 'required|boolean',
            'tanggal_validasi_ktp' => 'required|date'
        ];
    }
}
