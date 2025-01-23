<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRentalTransactionRequest extends FormRequest
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
            'pelanggan_id' => 'required|exists:customers,id',
            'pengemudi_id' => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_rencana_kembali' => 'required|date',
            'mulai_km' => 'required|numeric',
            'bahan_bakar_masuk' => 'required|string',
            'tanggal_kembali' => 'nullable|date',
            'akhir_km' => 'nullable|numeric',
            'bahan_bakar_habis' => 'nullable|string',
            'note' => 'nullable|string',

            // Validasi untuk file gambar
            'out_foto_depan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'out_foto_belakang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'out_foto_kanan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'out_foto_kiri' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'out_demage_note' => 'nullable|string',


            'back_foto_depan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'back_foto_belakang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'back_foto_kanan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'back_foto_kiri' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'back_demage_note' => 'nullable|string',
        ];
    }
}
