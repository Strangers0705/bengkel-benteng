<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'car_model' => 'required|string|max:255',
            'car_year' => 'required|integer|min:1950|max:' . (date('Y') + 1),
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'notes' => 'nullable|string',
        ];
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'phone.required' => 'Nomor telepon harus diisi',
            'car_model.required' => 'Model mobil harus diisi',
            'car_year.required' => 'Tahun mobil harus diisi',
            'car_year.integer' => 'Tahun mobil harus berupa angka',
            'car_year.min' => 'Tahun mobil tidak valid',
            'car_year.max' => 'Tahun mobil tidak valid',
            'service_id.required' => 'Layanan harus dipilih',
            'service_id.exists' => 'Layanan yang dipilih tidak valid',
            'appointment_date.required' => 'Tanggal janji temu harus diisi',
            'appointment_date.date' => 'Format tanggal tidak valid',
            'appointment_date.after_or_equal' => 'Tanggal janji temu tidak boleh di masa lalu',
            'appointment_time.required' => 'Waktu janji temu harus diisi',
        ];
    }
}