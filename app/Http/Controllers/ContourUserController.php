<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContourUser;


class ContourUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = ContourUser::get();
        return view('user.list')->with('users', $users);
    }

    public function create()
    {
      return view('user.create');
    }

    public function store(Request $request)
    {
        
        ContourUser::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        $users = ContourUser::get();
        return redirect()->route('listUser')->with('users', $users);
    }

    public function edit($id)
    {
        $user = ContourUser::find($id);
        return view('user.edit')->with('user',$user);
    }

    public function update(Request $request, $id)
    {
        $user = ContourUser::find($id);
        (isset($request->name)? $name = $request->name : $name = $user->name);
        (isset($request->email)? $email = $request->email : $email = $user->email);
        (isset($request->phone)? $phone = $request->phone : $phone = $user->phone);
        
        $user->update([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
        ]);

        $users = ContourUser::get();
        return redirect()->route('listUser')->with('users', $users);
    }

    public function destroy(Request $request)
    {
        $userId = $request->id;
        $user = ContourUser::find($userId);

        $user->delete();
    }
}
