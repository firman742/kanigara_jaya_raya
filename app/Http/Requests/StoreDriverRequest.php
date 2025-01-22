<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverRequest extends FormRequest
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
            'nama_pengemudi' => 'required|string',
            'nomor_telepon' => 'required|string',
            'alamat' => 'nullable|string',
            'lisensi' => 'required|string',
            'masa_berlaku_lisensi' => 'required|date',
        ];
    }
}
