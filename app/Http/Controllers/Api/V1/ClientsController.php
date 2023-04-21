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
        $client = new Client();
        $client->firstName = $request->firstName;
        $client->lastName = $request->lastName;
        $client->name = $request->name;
        $client->age = $request->age;
        $client->address = $request->address;
        $client->gender = $request->gender;
        $client->country = $request->country;
        $client->birthdate = $request->birthdate;
        $client->username = $request->username;
        $client->email = $request->email;
        $client->password = $request->password;
        $client->save();

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
        $data['address'] = $request['address'];


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
