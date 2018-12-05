<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class RoleRequest
 * @package App\Http\Requests
 */
class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): Array
    {
        $rules = [
            'title' => 'required|max:191|unique:roles',
            'discount' => 'required|min:0|max:50|numeric',
        ];

        if($this->isMethod('PUT')){
            $rules['title']='required|min:2';
        }
        return $rules;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->input('title');
    }

    public function getDiscount(): float
    {
        return (float)$this->input('discount');
    }
}
