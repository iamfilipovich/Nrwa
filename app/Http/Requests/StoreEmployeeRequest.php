<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Birthday' => 'required|date',
            'HireDate' => 'required|date',
            'Gendrer' => 'required|string',
            
        ];
    }
}
