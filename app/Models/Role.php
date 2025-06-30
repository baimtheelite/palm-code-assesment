<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasPermissions;

class Role extends Model
{
    use HasPermissions;

    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id')->where('guard_name', 'web');
    // }
}
