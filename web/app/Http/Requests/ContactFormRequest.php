<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactFormRequest extends Request
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
<<<<<<< HEAD
      return [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
      ];
=======
        return [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];
>>>>>>> a786be2e7de1af73ea86418d5bed460680867868
    }
}
