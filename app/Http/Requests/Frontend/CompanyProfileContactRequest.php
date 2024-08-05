<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CompanyProfileContactRequest extends FormRequest
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
      "email" => ["required", "string", "email"],
      "phone" => ["required", "digits:10"],
      "website_link" => ["nullable", "url"],
      "fb_link" => ["nullable", "url"],
      "province" => ["required"],
      "district" => ["required"],
      "ward" => ["required"],
      "address" => ["required"],
      "map_link" => ["nullable"],
    ];
  }
}
