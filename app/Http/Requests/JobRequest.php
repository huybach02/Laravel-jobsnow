<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
      "title" => ["required"],
      "job_category" => ["required"],
      "employment_level" =>  ["required"],
      "salary_structure" =>  ["required"],
      "salary_min" =>  ["required"],
      "salary_max" =>  ["required"],
      "deadline" =>  ["required"],
      "experience" =>  ["required"],
      "academic_level" =>  ["required"],
      "gender" =>  ["required"],
      "quantity" =>  ["required"],
      "work_mode" =>  ["required"],
      "province" =>  ["required"],
      "district" =>  ["required"],
      "ward" =>  ["required"],
      "address" =>  ["required"],
      "description" =>  ["required"],
      "requirement" =>  ["required"],
      "advanced_skills" =>  ["required"],
      "soft_skills" =>  ["required"],
      "foreign_languages" =>  ["required"],
      "benefits" =>  ["required"],
      "request_to_apply" =>  ["required"],
      "contact_person" =>  ["required"],
      "contact_email" =>  ["required"],
      "contact_phone" =>  ["required"],
    ];
  }
}
