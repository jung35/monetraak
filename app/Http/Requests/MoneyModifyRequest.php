<?php namespace MoneTraak\Http\Requests;

use MoneTraak\Http\Requests\Request;

class MoneyModifyRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'type'        => 'numeric|required',
            'amount'      => 'numeric|required',
            'description' => 'max:150'
        ];

        if($this->request->get('title')) {
            $rules['title'] = 'required|max:20';
        }

        return $rules;
    }

}
