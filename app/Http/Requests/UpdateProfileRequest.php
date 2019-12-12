<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
         'form.username'         => 'required|unique:users|min:3',
         'form.password'    =>      'required|min:8|confirmed',
         'form.confirm_password'        => 'required|',
         'form.current_password'       => 'required|u',
         'form.country_id'      => 'required|integer',
         'form.display_name'     => 'required|min:5',
         'form.email'    => 'required|unique:users,email_address',
         'form.phone_number' => 'required|alpha_num',
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
          'username.unique_users'         => 'required',
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
