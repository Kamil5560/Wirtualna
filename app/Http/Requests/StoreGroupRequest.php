<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
//            'name.required' => 'Jest wymagane pole nazwa'
            'name.required' => 'Jest wymagane pole :attribute'
        ]; // TODO: Nadawanie konkretnego komunikatu przy błędzie dla danego pola
    }

    public function attributes()
    {
        return [
            'name' => 'nazwa grupy'
        ];// TODO: Nadanie danemu atrybutowi konkretnej nazwy
    }
}
