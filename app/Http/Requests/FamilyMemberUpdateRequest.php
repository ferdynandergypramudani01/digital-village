<?php

namespace App\Http\Requests;

use App\Models\FamilyMember;
use Illuminate\Foundation\Http\FormRequest;

class FamilyMemberUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . FamilyMember::find($this->route('family_member'))->user_id,
            'password' => 'nullable|string|min:8',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'identity_number' => 'required|integer',
            'gender' => 'required|string|in:male,female',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|string',
            'occupation' => 'required|string',
            'marital_status' => 'required|string|in:married,single',
            'relation' => 'required|string|in:wife,child,husband'
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
            'relation' => 'Hubungan'
        ];
    }
}
