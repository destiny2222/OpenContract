<?php

namespace App\Http\Requests\Contract;

use App\Models\Contractor;
use Illuminate\Foundation\Http\FormRequest;

class Updaterequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['nullable', 'string'],
            'image'=>['nullable','image','mimes:jpeg,png,jpg,gif,svg'],
            'position'=>['nullable', 'string'],
        ];
    }   

    public function updateContract($id){
        $contract = Contractor::find($id);
        $contract->update([ 
            'name'=>$this->input('name'),
            'position'=>$this->input('position'),
            'image'=>update_image('upload/contract', $contract->image, 'image'),
         ]);

         return true;
    }
}
