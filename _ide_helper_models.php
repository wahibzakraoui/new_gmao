<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Area
 *
 * @property int $id
 * @property string $name
 * @property string $uuid
 * @property string $description
 * @property int|null $active
 * @property int $factory_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AreaCode[] $codes
 * @property-read int|null $codes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Equipment[] $equipments
 * @property-read int|null $equipments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Gamut[] $gamuts
 * @property-read int|null $gamuts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Part[] $parts
 * @property-read int|null $parts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Area newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area query()
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereFactoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereUuid($value)
 */
	class Area extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AreaCode
 *
 * @property int $id
 * @property int $area_id
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Area $area
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode whereUpdatedAt($value)
 */
	class AreaCode extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Criticity
 *
 * @property int $id
 * @property string $name
 * @property string $uuid
 * @property string $code
 * @property string $description
 * @property mixed $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereUuid($value)
 */
	class Criticity extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Equipment
 *
 * @property int $id
 * @property string $name
 * @property string $uuid
 * @property string $code
 * @property string $description
 * @property int|null $active
 * @property int $area_id
 * @property string $area_code
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Area $area
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Gamut[] $gamuts
 * @property-read int|null $gamuts_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereAreaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereUuid($value)
 */
	class Equipment extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Factory
 *
 * @property int $id
 * @property string $name
 * @property string $uuid
 * @property string $code
 * @property string $description
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Factory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Factory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Factory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereUuid($value)
 */
	class Factory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Gamut
 *
 * @property int $id
 * @property string $designation
 * @property string $uuid
 * @property string $code
 * @property string $state
 * @property string $type
 * @property int|null $factory_id
 * @property int|null $equipment_id
 * @property int|null $part_id
 * @property int|null $area_id
 * @property int|null $periodicity_id
 * @property string|null $work_instructions
 * @property string|null $estimated_hours
 * @property int|null $service_id
 * @property int|null $assigned_user_id
 * @property \Illuminate\Support\Carbon|null $next_run
 * @property int|null $runs
 * @property int|null $active
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Area|null $area
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WorkOrder[] $btcs
 * @property-read int|null $btcs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WorkOrder[] $done
 * @property-read int|null $done_count
 * @property-read \App\Models\Equipment|null $equipment
 * @property-read \App\Models\Factory|null $factory
 * @property-read \App\Models\Periodicity|null $periodicity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Task[] $tasks
 * @property-read int|null $tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WorkOrder[] $work_orders
 * @property-read int|null $work_orders_count
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereAssignedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereEquipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereEstimatedHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereFactoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereNextRun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut wherePartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut wherePeriodicityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereRuns($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereWorkInstructions($value)
 */
	class Gamut extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GamutDraft
 *
 * @property int $id
 * @property string $equipment
 * @property string $type
 * @property string $state
 * @property string $periodicity
 * @property string $area_code
 * @property string $equipment_code
 * @property string $factory_code
 * @property string $gamut_code
 * @property int $active
 * @property int|null $estimated_hours
 * @property int|null $assigned_user_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft query()
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereAreaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereAssignedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereEquipment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereEquipmentCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereEstimatedHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereFactoryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereGamutCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft wherePeriodicity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereUpdatedAt($value)
 */
	class GamutDraft extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GamutTool
 *
 * @property int $id
 * @property int|null $gamut_id
 * @property int|null $tool_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool query()
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool whereGamutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool whereToolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool whereUpdatedAt($value)
 */
	class GamutTool extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Part
 *
 * @property int $id
 * @property string $name
 * @property string $uuid
 * @property string $code
 * @property string|null $complementary_code
 * @property int|null $area_id
 * @property string $area_code
 * @property int|null $equipment_id
 * @property string $equipment_code
 * @property int|null $criticity_id
 * @property int $active
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Area|null $area
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Part newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Part newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Part query()
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereAreaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereComplementaryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereCriticityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereEquipmentCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereEquipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereUuid($value)
 */
	class Part extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Periodicity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $code
 * @property string $unit
 * @property float $frequency
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Gamut[] $gamuts
 * @property-read int|null $gamuts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereUpdatedAt($value)
 */
	class Periodicity extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Task
 *
 * @property int $id
 * @property string $label
 * @property string $description
 * @property string|null $quality
 * @property string|null $quantity
 * @property int $gamut_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereGamutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereQuality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 */
	class Task extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tool
 *
 * @property int $id
 * @property string $name
 * @property string $uuid
 * @property string $code
 * @property int $active
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tool newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tool newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tool query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereUuid($value)
 */
	class Tool extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property int|null $service_id
 * @property string|null $service
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Models{
/**
 * App\Models\Work
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Work newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Work newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Work query()
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereUpdatedAt($value)
 */
	class Work extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WorkOrder
 *
 * @property int $id
 * @property string $uuid
 * @property int|null $parent_id
 * @property string|null $designation
 * @property string|null $description
 * @property int|null $equipment_id
 * @property int|null $part_id
 * @property int|null $gamut_id
 * @property int|null $service_id
 * @property int|null $assigned_user_id
 * @property int|null $approved_by
 * @property int|null $requested_by
 * @property string|null $deadline
 * @property mixed $type
 * @property mixed $status
 * @property string|null $date_completed
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Gamut|null $gamut
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder btc()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder finished()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereAssignedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereDateCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereEquipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereGamutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder wherePartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereRequestedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereUuid($value)
 */
	class WorkOrder extends \Eloquent {}
}

