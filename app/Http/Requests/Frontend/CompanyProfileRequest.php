<?php

namespace App\Http\Requests\Frontend;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;

class CompanyProfileRequest extends FormRequest
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
    $rules = [
      "logo" => ["image", "max:10000"],
      "banner" => ["image", "max:10000"],
      "name" => ["required"],
      "industry_type_id" => ["required"],
      "organization_type_id" => ["required"],
      "team_size_id" => ["required"],
      "established_date" => ["required"],
      "bio" => ["required"],
      "vision" => ["nullable"],
      "tax_code" => ["required"],
    ];

    $company = Company::where("user_id", auth()->user()->id)->first();

    if (!$company) {
      $rules["logo"][] = "required";
      $rules["banner"][] = "required";
    }

    return $rules;
  }
}
