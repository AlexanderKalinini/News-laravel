<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostRequest extends FormRequest
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
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array
  {
    return [
      'text' => ['required', 'min:3'],
      'user_id' => ['exists:users']
    ];
  }
  protected function prepareForValidation(): void
  {
    $this->merge(['user_id' => auth()->user()->user_id]);
  }
}
