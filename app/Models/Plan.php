<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name', 'url', 'price', 'description'];

    /**
     * Get Tenants
     */
    
    public function tenants(){
        return $this->hasMany(Tenant::class);
    }

    public function details(){
        return $this->hasMany(DetailPlan::class);
    }

    /**
     * Get Profiles
     */
    
    public function profiles(){
        return $this->belongsToMany(Profile::class);
    }

    public function search($filter = null){
        return $this->where('name', 'LIKE', "%{$filter}%")
                    ->orWhere('description', 'LIKE', "%{$filter}%")
                    ->paginate(1);
    }

    /**
     * Profiles not linked with this Plan
     */

    public function profilesAvailable(){
        $profiles = Profile::whereNotIn('id', function($query){
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
        ->paginate();
        
        return $profiles;
    }
}
