<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateIdol extends FormRequest
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
            'title'=>'required|min:3',
            'content'=>'required|min:3',
            'due_date'=>'required|email',
            'image'=>'required|mimes:jpeg,bmp,png',
        ];
    }

    public function messages()
    {
        $messages = [
            'title.required' => 'Bat buoc phai nhap ten',
            'title.min' => 'Ten it nhat la 2 va lon nhat la 30!',
            'content.min' => 'Ten it nhat la 2 va lon nhat la 30!',
            'content.required' => 'Can nhap thong tin!',
            'image.required'=>'Can them anh',

        ];

        return $messages;
    }
}
