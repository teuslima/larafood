<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleUserController extends Controller
{
    protected $role, $user;
    public function __construct(Role $role, User $user)
    {
        $this->role = $role;
        $this->user = $user;

        $this->middleware('can:roles');
    }

    
    public function users($idRole){
        $role = $this->role->find($idRole);
        
        if(!$role)
            return redirect()->back();

        $users = $role->users()->paginate();
        
        return view('admin.pages.roles.users.users', compact('role', 'users'));
    }

    public function roles($idUser){
        if(!$user = $this->user->find($idUser))
            return redirect()->back();

        $roles = $user->roles()->paginate();

        return view('admin.pages.users.roles.roles', compact('user', 'roles'));
    }

    public function rolesAvailable($idRole){
        if(!$user = $this->user->find($idRole))
            return redirect()->back();

        $roles = $user->rolesAvailable();

        return view('admin.pages.users.roles.available', compact('user', 'roles'));
    }


    public function attachRolesUser(Request $request, $idUser){
        if(!$user = $this->user->find($idUser))
            return redirect()->back();

        if(!$request->roles || count($request->roles) == 0)
            return redirect()->back();

        $user->roles()->attach($request->roles);

        return redirect()->route('users.roles', $user->id);
    }

    public function detachRolesUser($idUser, $idRole){
        $user = $this->user->find($idUser);
        $role = $this->role->find($idRole);

        if(!$user || !$role)
            return redirect()->back();

        $user->roles()->detach($role);
        return redirect()->route('users.roles', $user->id);
    }
}
