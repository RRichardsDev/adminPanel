<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContourClient;
use App\Models\ContourUser;
use App\Models\ContourInstance;
use App\Models\ContourRoles;
use App\Models\instance_user_role_pivot;


class InstanceController extends Controller
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
        $instanceList = ContourInstance::get();

        $clientList = ContourClient::get();
        $instance = ContourInstance::with('client')->find(2);

        return view('instance.list')->with('instances', $instanceList)
                                    ->with('clients', $clientList);
       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientId = $_POST['selectedClient'];
        $client = ContourClient::find($clientId);
        $roles = ContourRoles::get();


        $users = ContourUser::get();

        ContourInstance::create([
            "client_id" => $clientId,
        ]);
        return view('instance.create')->with('client', $client)
                                        ->with('users', $users)
                                            ->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instanceId = '2';
        $userId = "1";
        $roleId = "2";

        instance_user_role_pivot::create([
            'instance_id' => $instanceId,
            'user_id' => $userId,
            'role_id' => $roleId,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instance = ContourInstance::find($id);
        $users = ContourUser::get();


        return view('instance.show')->with('instance', $instance)
                                    ->with('users', $users);
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

    public function byID(Request $request)
    {

        $user = ContourUser::find(6);
        $data = $user['name'];
        // dd($data);
        // dd($user);

        echo ($data);
        
    }

}
