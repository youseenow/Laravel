<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginPostRequest extends FormRequest {

    

    public function rules() {
        return [
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', 'max:72'],
        ];
    }
    
    
    
}
