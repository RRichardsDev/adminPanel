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

    public function index()
    {
        $clients = Client::get();
        return view('client.list')->with('clients', $clients);
                                    
    }

    public function create()
    {
        //
    }

    public function addUser(Request $request)
    {
        $status = 1;
        $userID = $request->selectedUser;
        $clientID = $request->clientID;

        //Gets Client/User
        $user = User::find($userID);
        $client = Client::find($clientID);
        //Checks if user already has an insatnce with the client
        if($client->users()->find($userID) == NULL)
        {
            $client->users()->attach($user);
        }else{
            $status = '1';
        };
        //Gets all clients
        $clients = Client::get();
        return redirect()->route('showClient', $clientID)->with('clients', $clients)
                                                            ->with('status', $status);

    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //fetches all users 
        $users = User::get();
        //fetches all roles
        $roles = Role::get();
        //gets client with user model
        $client = Client::with('users')->find($id);
        $uniqueUsers = $client->users->unique();

        return view('client.show')->with('client', $client)
                                    ->with('userList', $users)
                                    ->with('uniqueUsers', $uniqueUsers);
                                            
    }

    public function showUser($clientId, $userId)
    {
    
        $allRoles = Role::get();
        //Get Client with associated User
        $client = Client::with('users')->find($clientId);
        //Select user to display
        $userInstances = $client->users->where('id', $userId);
        //Get client as object
        $user = $client->users->where('id', $userId)->first();
        $roleID = $user->pivot->permission_role_id;
        //Gets all existing role Id's for the user
        foreach($userInstances as $instance){
            $userRoles[] = $instance->pivot->permission_role_id;
        }

        return view('client.userShow')->with('client', $client)
                                    ->with('user', $user)
                                    ->with('users', $userInstances)
                                    ->with('allRoles', $allRoles)                                
                                    ->with('userRoles', $userRoles);
    }

    public function updateUserRoles($clientId, $userId, Request $request)
    {

        //Gets client
        $client = Client::find($clientId);
        //Gets all user instances
        $userInstances = $client->users->where('id', $userId);
        //Gets user as object
        $user = User::find($userId);
        //Gets all roles
        $allRoles = Role::get();
        //Gets all sleceted roles
        $roleIDs = $request->except('_token');

        //Gets all existing role Id's for the user
            foreach($userInstances as $instance){
                $userRoles[] = $instance->pivot->permission_role_id;
            }
            foreach($roleIDs as $id => $checked){
                //Loop through user instances on the client
                foreach($userInstances as $instance){
                    //Checks the instance permission_role_id is part of the selected roles, if not, removes it.
                    if(!array_key_exists($instance->pivot->permission_role_id, $roleIDs)){
                        $client->users()->wherePivot('permission_role_id', '=', $instance->pivot->permission_role_id)
                                             ->where('user_id', $userId)
                                                ->detach();      
                    }
                    //Check if user already has the role on the Client instance, if not adds it
                   $client_user = $instance->pivot->where('permission_role_id', $id)
                                                    ->where('client_id', $clientId)
                                                        ->where('user_id', $userId)->first();

                    if($checked && $client_user === NULL){
                         $client->users()->attach($user, ['permission_role_id'=>$id]);
                    };


                }                          
            }; 

        return redirect()->route('clientShowUser', ['clientID'=>$clientId, 'userID'=>$userId])->with('client', $client)
                                    ->with('user', $user)
                                        ->with('users', $userInstances)
                                            ->with('allRoles', $allRoles)                                
                                                ->with('userRoles', $userRoles);
       
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {

        $clientId = $request->clientID;
        $userId = $request->userID;
        $user = User::find($userId);
        $client = Client::find($clientId);
       
        $client->users()->detach($userId);

        return redirect()->route('showClient', $clientId);
    }
}
