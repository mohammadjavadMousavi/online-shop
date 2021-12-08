<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    
    public function hasPermission(Permission $permission)
    {
        return $this->permissions()->where('permission_id',$permission->id)->exists();
    }

    public static function findByTitle($title)
    {
        return self::query()->whereTitle($title)->firstOrFail();
    }

    public function hasPermissionMiddle($permission)
    {
        return $this->permissions()->where('title',$permission)->exists();
    }
}
