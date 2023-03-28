<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;


class ClientController extends Controller
{
    public function index()
    {
        //
    }
    public function getAll(){
        $data = Client::get();
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data['firstName'] = $request['firstName'];
        $data['lastName'] = $request['lastName'];
        $data['name'] = $request['name'];
        $data['age'] = $request['age'];
        $data['address'] = $request['address'];
        $data['gender'] = $request['gender'];
        $data['country'] = $request['country'];
        $data['birthdate'] = $request['birthdate'];
        $data['username'] = $request['username'];
        $data['email'] = $request['email'];
        $data['password'] = $request['password'];
        Client::create($data);
        return response()->json([
            'message' => "Successfully created",
            'success' => true
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'name' => 'required',
            'age' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'birthdate' => 'required',
            'username' => 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);

        $clients = Post::create($request->all());

        return new PostResources($clients);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $data['firstName'] = $request['firstName'];
        $data['lastName'] = $request['lastName'];
        $data['name'] = $request['name'];
        $data['age'] = $request['age'];
        $data['address'] = $request['address'];
        $data['gender'] = $request['gender'];
        $data['country'] = $request['country'];
        $data['birthdate'] = $request['birthdate'];
        $data['username'] = $request['username'];
        $data['email'] = $request['email'];
        $data['password'] = $request['password'];

        Client::find($id)->update($data);
        return response()->json([
            'message' => "Successfully updated",
            'success' => true
        ], 200);
    }

    public function destroy(Client $client)
    {
        //
    }
    public function delete($id){
        $res = Client::find($id)->delete();
        return response()->json([
            'message' => "Successfully deleted",
            'success' => true
        ], 200);
    }
    public function get($id){
        $data = Client::find($id);
        return response()->json($data, 200);
    }
}
