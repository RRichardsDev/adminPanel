<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Role;
use App\Models\PermissionRole;


class ClientController extends Controller
{
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

        // dd($client->users->pivot->permission_role_id);

        // foreach($client->users as $user){
        //     $permission_role_id =  $user->pivot->permission_role_id;

        //     $role = Role::with('permissions')->find($permission_role_id);
        
        // };

        return $client;
           
        // return view('client.show')->with('client', $client)
        //                             ->with('users', $users)
        //                                 ->with('roles', $roles);
                                            
    }

    public function getRoleById($permission_role_id)
    {
        $role = Role::find($permission_role_id);

        return $role;
    }
    public function showUser($clientId, $userId)
    {
        $client = Client::with('users')->find($clientId);
        $user = $client->users->find($userId);
        $roles = Role::get();
        return view('client.userShow')->with('client', $client)
                                    ->with('user', $user)
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
