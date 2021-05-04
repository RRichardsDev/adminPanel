<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Status;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    public function index()
    {

        $users = User::get();
        return view('user.list')->with('users', $users);
    }

    public function create()
    {
        $statuses = Status::get();
        return view('user.create')->with('statuses', $statuses);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'status' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'status_id' => 2,
        ]);

        $users = User::get();
        return redirect()->route('listUser')->with('users', $users);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $statuses = Status::get();

        return view('user.edit')->with('user',$user)
                                    ->with('statuses', $statuses);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        //     'status' => ['required'],
            
        ]);
        $user = User::find($id);
        (isset($request->name)? $name = $request->name : $name = $user->name);
        (isset($request->email)? $email = $request->email : $email = $user->email);
        (isset($request->status)? $status = $request->status : $status = $user->status);

        
        $user->update([
            'name' => $name,
            'email' => $email,
            'status_id' => $status,
        ]);

        $users = User::with('status')->get();
        return redirect()->route('listUser')->with('users', $users);
    }

    public function show($id)
    {


        $user = User::with('status')->find($id);


        return view('user.show')->with('user', $user);
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
    public function updatePassword(Request $request)
    {
        $user = User::find($request->id);
        $password = Hash::make($request->password);
        $user->update(['password' => $password]);

        return $user;
        

    }
}
