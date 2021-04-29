<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Role;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClients(Request $request)
    {

        $search= $request->search;

        $clients = Client::with('users')->where('name', 'like', $search . '%')->orderBy('name')->get();
        return response()->json([
            'clients' => $clients,
        ]);

    }
    public function getUsers(Request $request)
    {

        $search= $request->search;

        $users = User::with('clients','status')->where('name', 'like', $search . '%')->orderBy('name')->get();

        return response()->json([
            'users' => $users,
        ]);

    }
    public function getRoles(Request $request)
    {

        $search= $request->search;

        $roles = Role::with('permissions')->where('name', 'like', $search . '%')->orderBy('name')->get();

        return response()->json([
            'roles' => $roles,
        ]);

    }

    public function getPermissions(Request $request)
    {

        $search= $request->search;

        $permissions = Permission::with('permissions')->where('name', 'like', $search . '%')->orderBy('name')->get();

        return response()->json([
            'permissions' => $permissions,
        ]);

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
