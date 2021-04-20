<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContourClient;

class ContourClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$clients = ContourClient::get();
        return view('client.list')->with('clients', $clients);
    }

    public function create()
    {
      return view('client.create');
    }

    public function store(Request $request)
    {
        
        ContourClient::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'address_postcode' => $request->address_postcode,
        ]);

        $clients = ContourClient::get();
        return view('client.list')->with('clients', $clients);
        
    }

    public function edit($id)
    {
        $client = ContourClient::find($id);
        return view('client.edit')->with('client',$client);
    }

    public function update(Request $request, $id)
    {
        $client = ContourClient::find($id);
        // Checking if a value has been enetered and setting it, if not, sets previous value to update
        (isset($request->name)? $name = $request->name : $name = $client->name);
        (isset($request->email)? $email = $request->email : $email = $client->email);
        (isset($request->phone)? $phone = $request->phone : $phone = $client->phone);
        (isset($request->address)? $address = $request->address : $address = $client->address);
        
        $client->update([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address
        ]);

        $clients = ContourClient::get();
        return redirect()->route('listClient')->with('clients', $clients);;
    }

    public function destroy(Request $request)
    {
        $clientId = $request->id;
        $client = ContourClient::find($clientId);
        $client->delete();
        
    }
}
