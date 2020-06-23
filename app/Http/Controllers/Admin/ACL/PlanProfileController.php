<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanProfileController extends Controller
{
    protected $plan, $profile;
    public function __construct(Plan $plan, Profile $profile)
    {
        $this->plan = $plan;
        $this->profile = $profile;
    }

    
    public function profiles($idPlan){
        if(!$plan = $this->plan->with('profiles')->find($idPlan))
            return redirect()->back();
        
        return view('admin.pages.plans.profiles.profiles', compact('plan'));
    }

    public function plans($idProfile){
        if(!$profile = $this->profile->find($idProfile))
            return redirect()->back();

        $plans = $profile->plans()->paginate();

        return view('admin.pages.profiles.plans.plans', compact('profile', 'plans'));
    }

    public function profilesAvailable($idPlan){
        if(!$plan = $this->plan->with('profiles')->find($idPlan))
            return redirect()->back();

        $profiles = $plan->profilesAvailable();

        return view('admin.pages.plans.profiles.available', compact('plan', 'profiles'));
    }


    public function attachProfilePlan(Request $request, $idPlan){
        $error = 'Precisa escolher pelo menos uma permissão';
        if(!$plan = $this->plan->with('profiles')->find($idPlan))
            return redirect()->back();

        if(!$request->profiles || count($request->profiles) == 0)
            return redirect()->back()->with('error');

        $plan->profiles()->attach($request->profiles);

        return redirect()->route('plans.profiles', $plan->id);
    }

    public function detachProfilePlan($idPlan, $idProfile){
        $plan = $this->plan->find($idPlan);
        $profile = $this->profile->find($idProfile);

        if(!$plan || !$profile)
            return redirect()->back();

        $plan->profiles()->detach($profile);
        return redirect()->route('plans.profiles', $plan->id);
    }
}
