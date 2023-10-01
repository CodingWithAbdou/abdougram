<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return Gate::allows('update-profile' , $this->user());
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>ro
     */
    public function rules(): array
    {
        return [
            'image' => ['nullable' , 'mimes:jpeg,jpg,png,gif' ],
            "bio" => 'required',
            'username' => ['string', 'max:255' , "alpha_dash"  , Rule::unique(User::class)->ignore($this->user()->id)],
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
