<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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

        switch($this->method()) {
            case 'PUT':
            case 'PATCH':
            return [
                'name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',

            ];

            default:
                return [
                    'name' => 'required|max:255',
                    'last_name' => 'required|max:255',
                    'password' => 'required|min:6',
                    'email' => 'required|email|max:255|unique:users',
                ];
        }


    }
}
