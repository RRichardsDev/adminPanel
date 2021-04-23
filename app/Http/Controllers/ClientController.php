<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Role;
use App\Models\PermissionRole;
use App\Models\ClientUserRoles;


class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::get();

        return view('client.list')->with('clients', $clients);
                                    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function addUser(Request $request)
    {
        $status = 1;
        $userID = $request->selectedUser;
        $clientID = $request->clientID;

        $user = User::find($userID);
        $client = Client::find($clientID);

        if($client->users()->find($userID) == NULL)
        {
            $client->users()->attach($user);
        }else{
            $status = '1';
        };
        
        $clients = Client::get();
        return redirect()->route('showClient', $clientID)->with('clients', $clients)
                                                            ->with('status', $status);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //fetches all users 
        $users = User::get();
        //fetches all roles
        $roles = Role::get();
        //gets client with user model
        $client = Client::with('users')->find($id);
        $uniqueUsers = $client->users->unique();


        // $permissions = Role::with('permissions')->find(1);

        // return $permissions;

        // return $client;
           
        return view('client.show')->with('client', $client)
                                    ->with('userList', $users)
                                    ->with('uniqueUsers', $uniqueUsers);
                                            
    }

    public function showUser($clientId, $userId)
    {
        
        $roles = Role::get();
        $allRoles = Role::get();
        //Get Cleint with associated User
       
        $client = Client::with('users')->find($clientId);
        //Select user to display
        $user = $client->users->where('id', 5);

        // Working
        // ---------------------------------------------------------------

        foreach($client->users->where('id', 5) as $userRole){
            // roles[] = $userRole->pivot->permission_role_id;
        };
        // dd($roles);


        // ---------------------------------------------------------------



        // dd($user->pivot->permission_role_id);
        // dd($user);
        // foreach ($client->users->where('id', $userId) as $user){
        //     $roles[] = $user->pivot->permission_role_id;
        // };
        
        // dd($roles);
        //get the Associated permission/role relation
        // dd($client);
        $permission_role_id =  1;
        //get all asssociated permission roles
        // $permissionRoles = PermissionRole::where('id', $permission_role_id)->get();

        // dd($permissionRoles);
        // foreach($permissionRoles as $role){
        //    $ids[] = $role->role_id;
        // };

        // $roles = Role::with('permissions')->whereIn('id', $ids)->get();

        // dd($roles);
        // $permission_role_id =  $user->pivot->permission_role_id;

        // $permissionRoles = User::with('roles')->get();
        // with('roles')->find($permission_role_id);
        // $roles = Role::with('permissions')->find($permission_role_id);
        // dd($roles);

        return view('client.userShow')->with('client', $client)
                                    ->with('user', $user)
                                    ->with('allRoles', $allRoles)
                                    ->with('roles', $roles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
