<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCallRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Ubah sesuai dengan kebutuhan otorisasi
    }

    public function rules()
    {
        return [
            'id_device' => 'required|string|max:255',
            'button_type' => 'required|string|max:255',
            'status' => 'required|string|in:ON,OFF',
        ];
    }
}
