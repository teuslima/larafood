<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * Get Permissions
     */
    
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }
    
    /**
     * Get Users
     */
    
    public function users(){
        return $this->belongsToMany(User::class);
    }

    
    /**
     * Permissions not linked with this Role
     */
    public function permissionsAvailable(){
        $permissions = Permission::whereNotIn('id', function($query){
            $query->select('permission_role.permission_id');
            $query->from('permission_role');
            $query->whereRaw("permission_role.role_id={$this->id}");
        })
        ->paginate();
        
        return $permissions;
    }
}
