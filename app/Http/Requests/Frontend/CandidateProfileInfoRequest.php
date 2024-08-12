<?php

namespace App\Http\Requests\Frontend;

use App\Models\Candidate;
use Illuminate\Foundation\Http\FormRequest;

class CandidateProfileInfoRequest extends FormRequest
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
      "image" => ["image", "max:10000"],
      "full_name" => ["required"],
      "birthday" => ["required"],
      "gender" => ["required"],
      "marital_status" => ["required"],
      "profession_id" => ["required"],
      "experience_id" => ["required"],
      "employment_level_id" => ["required"],
      "desired_salary_id" => ["required"],
      "career_goals" => ["required"],
      "cv_link" => ["nullable", "mimes:pdf,doc,docx"],
    ];

    $candidate = Candidate::where("user_id", auth()->user()->id)->first();

    if (!$candidate) {
      $rules["image"][] = "required";
    }

    return $rules;
  }
}
