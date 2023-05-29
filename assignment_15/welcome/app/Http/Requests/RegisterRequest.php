<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return false;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array
  {
    return [
      'name' => 'required|string|min:2',
      'email' => 'required|email|unique:users',
      'password' => 'required|string|min:8',
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'Name is required',
      'name.string' => 'Name must be a string',
      'name.min' => 'Name must be at least 2 characters',
      'email.required' => 'Email is required',
      'email.email' => 'Email must be a valid email address',
      'email.unique' => 'Email already exists',
      'password.required' => 'Password is required',
      'password.string' => 'Password must be a string',
      'password.min' => 'Password must be at least 8 characters',
    ];
  }


  protected function failedValidation(Validator $validator): void
  {
    throw new HttpResponseException(
      response()->json([
        'errors' => $validator->errors(),
      ], 422)
    );
  }
}
