<?php

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
