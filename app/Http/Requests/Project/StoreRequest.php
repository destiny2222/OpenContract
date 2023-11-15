<?php

namespace App\Http\Requests\Project;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

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
            'title'=>['required','string'],
            'body'=>['nullable','string'],
            'value'=>['nullable','string'],
            'award_date'=>['nullable','string', 'date'],
            'award'=>['nullable','string'],
            'location'=>['nullable','string'],
            'company_name'=>['nullable','string'],
            'contructor_name'=>['nullable','string'],
            'contructor_origin'=>['nullable','string'],
            'category'=>['nullable','string'],
            'year'=>['nullable','string'],
            'procuring_entity'=>['nullable','string'],
            'contract_amount'=>['nullable', 'numeric'],
            'tender_amount'=>['nullable','numeric'],
            'budget_amount'=>['nullable','numeric'],
            'status'=>['nullable', 'string'],
            'active'=>['nullable', 'string']
        ];
    }

    public function createStore(){
        Project::create([ 
            'title'=>$this->title,
            'body'=>$this->body,
            'value'=>$this->value,
            'award'=>$this->award,
            'award_date'=>$this->award_date,
            'location'=>$this->location,
            'company_name'=>$this->company_name,
            'contructor_name'=>$this->contructor_name,
            'contructor_origin'=>$this->contructor_origin,
            'category'=>$this->category,
            'year'=>$this->year,
            'procuring_entity'=>$this->procuring_entity,
            'contract_amount'=>$this->contract_amount,
            'tender_amount'=>$this->tender_amount,
            'budget_amount'=>$this->budget_amount,
            'status'=>$this->status,
            'active'=>$this->active,
            'slug'=>Str::slug($this->title),
            'contractor_id'=>$this->contractor_id,
         ]);
         return true;
    }
}
