<?php

namespace App\Http\Requests;

use App\Models\Plataforma;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StorePlataformaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Plataforma::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
