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
 * @property string|null $academic_level_id
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereAcademicLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereAdvancedSkills($value)
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
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

