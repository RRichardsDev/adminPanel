<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::get();
        return view('user.list')->with('users', $users);
    }

    public function create()
    {
      return view('user.create');
    }

    public function store(Request $request)
    {
        
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $users = User::get();
        return redirect()->route('listUser')->with('users', $users);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit')->with('user',$user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        (isset($request->name)? $name = $request->name : $name = $user->name);
        // if(isset($request->email)){
        //     $email = $request->email;
        //     dd(1);
        // }else{
        //     $email = $user->email;
        //     dd(2);
        // }
        (isset($request->email)? $email = $request->email : $email = $user->email);
       
        
        $user->update([
            'name' => $name,
            'email' => $email,
        ]);

        $users = User::get();
        return redirect()->route('listUser')->with('users', $users);
    }

    public function destroy(Request $request)
    {
        $userId = $request->id;
        $user = User::find($userId);
        $clients = Client::get();
        
        foreach($clients as $client){
             $client->users()->detach($userId);
        }
       
        $user->delete();

        return redirect()->route('listUser');
    }
}
