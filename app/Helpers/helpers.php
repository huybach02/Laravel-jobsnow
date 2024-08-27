<?php

use App\Models\AppliedJob;
use App\Models\Candidate;
use App\Models\Company;

function setActive(array $route)
{
  if (is_array($route)) {
    foreach ($route as $r) {
      if (request()->routeIs($r)) {
        return "active open";
      }
    }
  }
}

function setSubActive(array $route)
{
  if (is_array($route)) {
    foreach ($route as $r) {
      if (request()->routeIs($r)) {
        return "active";
      }
    }
  }
}

function isCompanyProfileCompleted()
{
  $requiredFields = [
    "logo",
    "banner",
    "name",
    "industry_type_id",
    "organization_type_id",
    "team_size_id",
    "tax_code",
    "established_date",
    "bio",
    "email",
    "phone",
    "province",
    "district",
    "ward",
    "address",
    "slug"
  ];

  $companyProfile = Company::where("user_id", auth()->user()->id)->first();

  if ($companyProfile) {
    foreach ($requiredFields as $field) {
      if (empty($companyProfile->{$field})) {
        return false;
      }
    }
    return true;
  }

  return false;
}

function isCandidateProfileCompleted()
{
  $requiredFields = [
    "image",
    "full_name",
    "slug",
    "gender",
    "phone",
    "email",
    "marital_status",
    "birthday",
    "employment_level_id",
    "desired_salary_id",
    "career_goals",
    "province",
    "district",
    "ward",
    "address",
    "workplace_desired",
    "profession_id",
    "academic_level_id",
    "experience_id",
    "advanced_skills",
    "computer_skills",
    "foreign_languages",
    "soft_skills",
    "allow_show"
  ];

  if (auth()->check()) {
    $candidateProfile = Candidate::where("user_id", auth()->user()->id)->first();

    if ($candidateProfile) {
      foreach ($requiredFields as $field) {
        if (empty($candidateProfile->{$field})) {
          return false;
        }
      }
      return true;
    }
  }

  return false;
}

function formatMoney($number)
{
  return number_format($number, 0, ',', '.') . ' ₫';
}

function limitText($text, $limit = 100, $end = '...')
{
  if (strlen($text) <= $limit) {
    return $text;
  }

  return substr($text, 0, $limit) . $end;
}

function isApplied($jobId)
{
  if (auth()->check() && auth()->user()->role == 'candidate') {
    $applied = AppliedJob::where('job_id', $jobId)->where('candidate_id', auth()->user()->candidate->id)->first();
    if ($applied) {
      return true;
    }
    return false;
  }
  return false;
}
