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
 * @property int|null $industry_type_id
 * @property int|null $organization_type_id
 * @property int|null $team_size_id
 * @property string|null $logo
 * @property string|null $banner
 * @property string|null $established_date
 * @property string|null $bio
 * @property string|null $vision
 * @property int|null $total_views
 * @property string|null $address
 * @property string|null $province_city
 * @property string|null $district
 * @property string|null $commune_ward
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
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCommuneWard($value)
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
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereProvinceCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTaxCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTeamSizeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTotalViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereVisibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereVision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWebsiteLink($value)
 */
	class Company extends \Eloquent {}
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

