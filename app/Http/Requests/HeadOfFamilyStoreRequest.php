<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class HeadOfFamilyStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'identity_number' => 'required|integer',
            'gender' => 'required|string|in:male,female',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|string',
            'occupation' => 'required|string',
            'marital_status' => 'required|string|in:married,single'
        ];
    }

    
    public function attributes()
    {
        return [
            'name'=> 'Name',
            'email'=> 'Email',
            'password'=> 'Kata Sandi',
            'profile_picture'=> 'Foto Profil',
            'identity_number'=> 'Nomor Identitas',
            'gender' => 'Jenis Kelamin',
            'phone_number' => 'Nomor Telepon',
            'ocupation' => 'Pekerjaan',
            'marital_status' => 'Status Perkawinan',
        ];
    }


    public function messages()
    {
        return [
            'required' => ':attribute wajib diisi',
            'string' => ':attribute harus berupa string',
            'max' => ':attribute tidak boleh lebih dari :max karakter',
            'min' => ':attribute harus memiliki minimal :min karakter',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email yang valid',
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berupa file dengan format: :values',
            'integer' => ':attribute harus berupa angka',
            'array' => ':attribute harus berupa array',
            'exists' => ':attribute tidak ditemukan',
            'max:2048' => ':attribute tidak boleh lebih dari 2MB',
            'unique:users' => ':attribute sudah ada',
            'in' => ':attribute harus berupa salah satu dari: :values',
        ];
    }
}
