<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
     return [
       'username'         => 'required|unique:users|min:3',
       'password'    =>      'required|min:8|confirmed',
       'confirm_password'        => 'required|',
       'current_password'       => 'required|u',
       'country_id'      => 'required|integer',
       'display_name'     => 'required|min:5',
       'email'    => 'required|unique:users,email_address',
       'phone_number' => 'required|alpha_num',
       'image' => 'mimes:jpg,png,gif'
     ];

   }


     /**
      * Get the error messages for the defined validation rules.
      *
      * @return array
      */
     public function messages()
     {
       return [
        'username'         => 'required',
        'confirm_password'        => 'required',
        'country_id'      => 'required',
        'current_password'       => 'required',
        'display_name'     => 'required',
        'email'    => 'required',
        'password'    => 'required',
        'phone_number' => 'required'
      ];
    }


  }
