<?php

namespace App\Http\Requests\Contract;

use App\Models\Contractor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class Storerequest extends FormRequest
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



    public function createStore(){
        
        Contractor::create([ 
            'name'=>$this->name,
            'position'=>$this->position,
            'image'=>upload_single_image('upload/contract/' , 'image'),
            'slug'=>Str::slug($this->name),
        ]);
        return true;
    }
}
