<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MaterialRequest extends Request
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
                    'name'=>'required',
                    'price'=>'required|integer',
                ];

            default:
                return [
                    'name'=>'required|unique:materials',
                    'price'=>'required|integer',
                ];
        }
    }
}
