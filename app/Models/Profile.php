<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * Get Permissions
     */
    
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }
    /**
     * Permissions not linked with this profile
     */
    public function permissionsAvailable(){
        $permissions = Permission::whereNotIn('id', function($query){
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
        ->paginate();
        
        return $permissions;
    }
}
