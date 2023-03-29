<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return ClientResource::collection(Client::latest()->paginate());
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
        Client::create($request->all());
        return response()->json([
            'message' => "Created",
            'success' => true
        ], 201);
    }

    /**
     * Display the specified resource.
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return new Client($client);
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if ( $client->delete() ) {
            return response()->json([
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ], 404);

    }
}