<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        return view('role.list')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRoll(Request $request)
    {
        $permissions = Permission::get();
        $role = Role::create([
                    'name' => $request->name,
                    'description' => $request->description
                ]);
        return view('role.show')->with('role',$role)
                                    ->with('permissions',$permissions);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::with('permissions')->find($id);
        $permissions = Permission::get();

        // $this->setPermission(1, 25);

        return view('role.show')->with('role', $role)
                                    ->with('permissions', $permissions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::with('permissions')->find($id);
        $permissions = Permission::get();

        return view('role.edit')->with('role', $role)
                                    ->with('permissions', $permissions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $role = Role::with('permissions')->get($id);

        (isset($request->name)? $name = $request->name : $name = $role->name);
        (isset($request->description)? $description = $request->description : $description = $role->description);

        $role->update([
            'name' => $name,
            'description' => $email,
        ]);

        $roles = Role::get();
        return redirect()->route('listRole')->with('roles', $roles);
    }

    public function addPermissionToRoll($roleId, $permissonId) 
    {
        $role = Role::find($roleId);
        $permission = Permission::find($permissonId);

        $role->permissions()->attach($permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
