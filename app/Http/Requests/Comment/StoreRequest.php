<?php

namespace App\Http\Requests\Comment;

use App\Models\project_comment;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email'=>['nullable', 'string'],
            'message'=>['nullable', 'string'],
        ];
    }

    public function createComment(){
        project_comment::create([ 
            'name'=>$this->name,
            'email'=>$this->email,
            'message'=>$this->message,
            'project_id'=>$this->project_id,
            'contractor_id'=>$this->contractor_id
         ]);
         return true;
    }
}
