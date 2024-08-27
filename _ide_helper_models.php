<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Candidate> $candidates
 * @property-read int|null $candidates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Job> $jobs
 * @property-read int|null $jobs_count
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicLevel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicLevel whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicLevel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicLevel whereUpdatedAt($value)
 */
	class AcademicLevel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $job_id
 * @property int $candidate_id
 * @property string|null $message
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Candidate|null $candidate
 * @property-read \App\Models\Job|null $job
 * @method static \Illuminate\Database\Eloquent\Builder|AppliedJob newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppliedJob newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppliedJob query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppliedJob whereCandidateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppliedJob whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppliedJob whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppliedJob whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppliedJob whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppliedJob whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppliedJob whereUpdatedAt($value)
 */
	class AppliedJob extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $image
 * @property string|null $full_name
 * @property string|null $slug
 * @property string|null $gender
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $cv_link
 * @property string|null $bio
 * @property string|null $marital_status
 * @property string|null $birthday
 * @property int|null $employment_level_id
 * @property int|null $desired_salary_id
 * @property string|null $career_goals
 * @property int|null $province
 * @property int|null $district
 * @property int|null $ward
 * @property string|null $address
 * @property string|null $workplace_desired
 * @property string|null $fb_link
 * @property string|null $title
 * @property int|null $profession_id
 * @property int|null $academic_level_id
 * @property int|null $experience_id
 * @property int|null $education_id
 * @property int|null $experience_work_id
 * @property string|null $advanced_skills
 * @property string|null $computer_skills
 * @property string|null $foreign_languages
 * @property string|null $soft_skills
 * @property int $status
 * @property int $profile_completed
 * @property int $view_count
 * @property int $allow_show
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AcademicLevel|null $academicLevel
 * @property-read \App\Models\District|null $candidateDistrict
 * @property-read \App\Models\ProvinceCity|null $candidateProvince
 * @property-read \App\Models\CommuneWard|null $candidateWard
 * @property-read \App\Models\DesiredSalary|null $desiredSalary
 * @property-read \App\Models\EmploymentLevel|null $employmentLevel
 * @property-read \App\Models\Experience|null $experience
 * @property-read \App\Models\Profession|null $profession
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereAcademicLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereAdvancedSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereAllowShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereCareerGoals($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereComputerSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereCvLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereDesiredSalaryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereEducationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereEmploymentLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereExperienceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereExperienceWorkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereFbLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereForeignLanguages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereProfessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereProfileCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereSoftSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereViewCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereWard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereWorkplaceDesired($value)
 */
	class Candidate extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $candidate_id
 * @property string|null $name_education
 * @property string|null $training_unit
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateEducation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateEducation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateEducation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateEducation whereCandidateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateEducation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateEducation whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateEducation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateEducation whereNameEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateEducation whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateEducation whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateEducation whereTrainingUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateEducation whereUpdatedAt($value)
 */
	class CandidateEducation extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $candidate_id
 * @property int $language_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateLanguage whereCandidateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateLanguage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateLanguage whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateLanguage whereUpdatedAt($value)
 */
	class CandidateLanguage extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $candidate_id
 * @property string|null $name_company
 * @property string|null $position
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int $current_working
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateWork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateWork newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateWork query()
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateWork whereCandidateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateWork whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateWork whereCurrentWorking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateWork whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateWork whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateWork whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateWork whereNameCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateWork wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateWork whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidateWork whereUpdatedAt($value)
 */
	class CandidateWork extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $code
 * @property string $name
 * @property string|null $name_en
 * @property string|null $full_name
 * @property string|null $full_name_en
 * @property string|null $code_name
 * @property string|null $district_code
 * @property int|null $status
 * @property int|null $administrative_unit_id
 * @property-read \App\Models\District|null $district
 * @method static \Illuminate\Database\Eloquent\Builder|CommuneWard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommuneWard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommuneWard query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommuneWard whereAdministrativeUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommuneWard whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommuneWard whereCodeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommuneWard whereDistrictCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommuneWard whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommuneWard whereFullNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommuneWard whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommuneWard whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommuneWard whereStatus($value)
 */
	class CommuneWard extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $slug
 * @property int $industry_type_id
 * @property int $organization_type_id
 * @property int $team_size_id
 * @property string|null $logo
 * @property string|null $banner
 * @property string|null $established_date
 * @property string|null $bio
 * @property string|null $vision
 * @property int|null $total_views
 * @property string|null $address
 * @property int|null $province
 * @property int|null $district
 * @property int|null $ward
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $map_link
 * @property string|null $tax_code
 * @property int $is_profile_verified
 * @property int|null $document_verified_at
 * @property int $profile_completed
 * @property int $visibility
 * @property int $status
 * @property string|null $fb_link
 * @property string|null $website_link
 * @property float|null $limit_post
 * @property float|null $used_post
 * @property float|null $limit_featured_post
 * @property float|null $used_featured_post
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\District|null $companyDistrict
 * @property-read \App\Models\ProvinceCity|null $companyProvince
 * @property-read \App\Models\CommuneWard|null $companyWard
 * @property-read \App\Models\IndustryType $industry
 * @property-read \App\Models\OrganizationType $organization
 * @property-read \App\Models\TeamSize $teamSize
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereDocumentVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEstablishedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereFbLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereIndustryTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereIsProfileVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLimitFeaturedPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLimitPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereMapLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereOrganizationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereProfileCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTaxCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTeamSizeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTotalViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUsedFeaturedPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUsedPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereVisibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereVision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWebsiteLink($value)
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $company_id
 * @property int $plan_id
 * @property string $plan_name
 * @property float $plan_price
 * @property float $job_count
 * @property float $featured_job_count
 * @property int $company_featured_show
 * @property int $company_verified_show
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPlan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPlan query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPlan whereCompanyFeaturedShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPlan whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPlan whereCompanyVerifiedShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPlan whereFeaturedJobCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPlan whereJobCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPlan wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPlan wherePlanName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPlan wherePlanPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPlan whereUpdatedAt($value)
 */
	class CompanyPlan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DesiredSalary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DesiredSalary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DesiredSalary query()
 * @method static \Illuminate\Database\Eloquent\Builder|DesiredSalary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DesiredSalary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DesiredSalary whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DesiredSalary whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DesiredSalary whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DesiredSalary whereUpdatedAt($value)
 */
	class DesiredSalary extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $code
 * @property string $name
 * @property string|null $name_en
 * @property string|null $full_name
 * @property string|null $full_name_en
 * @property string|null $code_name
 * @property string|null $province_code
 * @property int|null $status
 * @property int|null $administrative_unit_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CommuneWard> $communeWards
 * @property-read int|null $commune_wards_count
 * @property-read \App\Models\ProvinceCity|null $province
 * @method static \Illuminate\Database\Eloquent\Builder|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District query()
 * @method static \Illuminate\Database\Eloquent\Builder|District whereAdministrativeUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCodeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereFullNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereProvinceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereStatus($value)
 */
	class District extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Candidate> $candidates
 * @property-read int|null $candidates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Job> $jobs
 * @property-read int|null $jobs_count
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentLevel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentLevel whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentLevel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentLevel whereUpdatedAt($value)
 */
	class EmploymentLevel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Candidate> $candidates
 * @property-read int|null $candidates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Job> $jobs
 * @property-read int|null $jobs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Experience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience query()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereUpdatedAt($value)
 */
	class Experience extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $post_id
 * @property int $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FeaturedPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeaturedPost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeaturedPost query()
 * @method static \Illuminate\Database\Eloquent\Builder|FeaturedPost whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeaturedPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeaturedPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeaturedPost wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeaturedPost whereUpdatedAt($value)
 */
	class FeaturedPost extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|IndustryType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IndustryType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IndustryType query()
 * @method static \Illuminate\Database\Eloquent\Builder|IndustryType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IndustryType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IndustryType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IndustryType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IndustryType whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IndustryType whereUpdatedAt($value)
 */
	class IndustryType extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int $company_id
 * @property string $job_category
 * @property string $employment_level
 * @property string $salary_structure
 * @property float $salary_min
 * @property float $salary_max
 * @property string $deadline
 * @property string $experience
 * @property string $academic_level
 * @property string $gender
 * @property int $quantity
 * @property string $work_mode
 * @property int $province
 * @property int $district
 * @property int $ward
 * @property string $address
 * @property string $description
 * @property string $requirement
 * @property string $advanced_skills
 * @property string $soft_skills
 * @property string $foreign_languages
 * @property string $benefits
 * @property string $request_to_apply
 * @property string $contact_person
 * @property string $contact_email
 * @property string $contact_phone
 * @property int $view_count
 * @property int $is_featured
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AppliedJob> $applications
 * @property-read int|null $applications_count
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\District|null $jobDistrict
 * @property-read \App\Models\ProvinceCity|null $jobProvince
 * @property-read \App\Models\CommuneWard|null $jobWard
 * @method static \Illuminate\Database\Eloquent\Builder|Job newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job query()
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereAcademicLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereAdvancedSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereBenefits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereContactPerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereContactPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereEmploymentLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereForeignLanguages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereJobCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereRequestToApply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereRequirement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSalaryMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSalaryMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSalaryStructure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSoftSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereViewCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereWard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereWorkMode($value)
 */
	class Job extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $job_id
 * @property int $candidate_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Candidate|null $candidate
 * @property-read \App\Models\Job|null $job
 * @method static \Illuminate\Database\Eloquent\Builder|JobBookmark newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobBookmark newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobBookmark query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobBookmark whereCandidateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobBookmark whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobBookmark whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobBookmark whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobBookmark whereUpdatedAt($value)
 */
	class JobBookmark extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|JobCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobCategory whereUpdatedAt($value)
 */
	class JobCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereUpdatedAt($value)
 */
	class Language extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $order_id
 * @property int $company_id
 * @property int $plan_id
 * @property string $plan_name
 * @property float $price
 * @property string $transaction_id
 * @property string $method
 * @property string $currency_name
 * @property string $status
 * @property float $job_count
 * @property float $featured_job_count
 * @property int $company_featured_show
 * @property int $company_verified_show
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company $company
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCompanyFeaturedShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCompanyVerifiedShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereFeaturedJobCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereJobCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePlanName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationType whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationType whereUpdatedAt($value)
 */
	class OrganizationType extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $label
 * @property int $price
 * @property int $job_count
 * @property int $featured_job_count
 * @property int $company_featured_show
 * @property int $company_verified_show
 * @property int $recommended
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Plan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereCompanyFeaturedShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereCompanyVerifiedShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereFeaturedJobCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereJobCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereRecommended($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereUpdatedAt($value)
 */
	class Plan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Profession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profession newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profession query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profession whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profession whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profession whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profession whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profession whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profession whereUpdatedAt($value)
 */
	class Profession extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $code
 * @property string $name
 * @property string|null $name_en
 * @property string|null $full_name
 * @property string|null $full_name_en
 * @property string|null $code_name
 * @property int|null $status
 * @property int|null $administrative_unit_id
 * @property int|null $administrative_region_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\District> $districts
 * @property-read int|null $districts_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceCity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceCity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceCity query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceCity whereAdministrativeRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceCity whereAdministrativeUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceCity whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceCity whereCodeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceCity whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceCity whereFullNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceCity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceCity whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceCity whereStatus($value)
 */
	class ProvinceCity extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryStructure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryStructure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryStructure query()
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryStructure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryStructure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryStructure whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryStructure whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryStructure whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryStructure whereUpdatedAt($value)
 */
	class SalaryStructure extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SoftSkill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SoftSkill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SoftSkill query()
 * @method static \Illuminate\Database\Eloquent\Builder|SoftSkill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SoftSkill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SoftSkill whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SoftSkill whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SoftSkill whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SoftSkill whereUpdatedAt($value)
 */
	class SoftSkill extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TeamSize newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamSize newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamSize query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamSize whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamSize whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamSize whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamSize whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamSize whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamSize whereUpdatedAt($value)
 */
	class TeamSize extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Candidate|null $candidate
 * @property-read \App\Models\Company|null $company
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Job> $jobs
 * @property-read int|null $jobs_count
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMode query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMode whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMode whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMode whereUpdatedAt($value)
 */
	class WorkMode extends \Eloquent {}
}

