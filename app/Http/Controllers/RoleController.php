<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\PermissionRole;
use Illuminate\Support\Facades\Schema;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $roles = Role::get();
        return view('role.list')->with('roles', $roles);
    }

    public function create()
    {
        return view('role.create');
    }

    public function storeRoll(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required|max:255',
        ]);
        $permissions = Permission::get();
        (isset($request->name)? $name = $request->name : $name = $role->name);
        (isset($request->description)? $description = $request->description : $description = $role->description);
        $role = Role::create([
                    'name' => $request->name,
                    'description' => $request->description
                ]);

        $role->permissions()->attach(0);

        return redirect()->route('showRole', $role->id)->with('role',$role)
                                    ->with('permissions',$permissions);
        
    }

    public function show($id)
    {
        $role = Role::with('permissions')->find($id);
        $permissions = Permission::get();

        // $this->setPermission(1, 25);

        return view('role.show')->with('role', $role)
                                    ->with('permissions', $permissions);
    }

    public function edit($id)
    {
        $role = Role::with('permissions')->find($id);
        $permissions = Permission::get();

        return view('role.edit')->with('role', $role)
                                    ->with('permissions', $permissions);
    }

    public function update(Request $request, $id)
    {

         $role = Role::with('permissions')->find($id);

        (isset($request->name)? $name = $request->name : $name = $role->name);
        (isset($request->description)? $description = $request->description : $description = $role->description);


        $role->update([
            'name' => $name,
            'description' => $description,
        ]);

        $roles = Role::with('permissions')->get();
        return redirect()->route('showRole', $role->id)->with('roles', $roles);
    }

    public function updatePermissionRoles(Request $request, $id)
    {

        $role = Role::with('permissions')->find($id);
        $allPermissions = Permission::get();
        $setPermissions = $role->permissions()->get();
        $permissionIDs = $request->except('_token');

        // For each checked permission
            foreach($permissionIDs as $pid => $checked){
                // For each existing role
                foreach ($setPermissions as $existing) {
                    $exists = !empty($role->permissions()->find($pid));
                    // If a permission  is attached to a role, but not a checked permission
                    if(!array_key_exists($existing->id, $permissionIDs)){
                        if(count($setPermissions) !== 1){
                            Schema::disableForeignKeyConstraints();       
                            $permission = $role->permissions->where('id', $existing->id);
                            $role->permissions()->detach($permission);
                            Schema::enableForeignKeyConstraints();
                        }
                        
                        
                    }elseif(!$exists){

                        $role->permissions()->attach($pid);
                    }
                }     
            }

        return redirect()->route('showRole', $id)->with('role', $role)
                                                    ->with('permissions', $allPermissions);
       
    }

    public function addPermissionToRoll($roleId, $permissonId) 
    {
        $role = Role::find($roleId);
        $permission = Permission::find($permissonId);

        $role->permissions()->attach($permission);
    }

    public function destroy($id)
    {   
        $clients = Client::with('users')->get();
        $role = Role::with('permissions')->find($id);

        // Removes all role relations to users
        foreach($clients as $client){
            $client->users()->wherePivot('permission_role_id', '=', $id)->detach();
        }

        foreach($role->permissions as $permission){
            $role->permissions()->detach($permission->id);
        }

        $role->delete();
        
        $roles = Role::get();

         return redirect()->route('listRole')->with('roles', $roles);
    }
}
