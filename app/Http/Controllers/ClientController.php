<?php

namespace App\Http\Controllers;

use App\Models\Client;
use http\Env\Response;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Post::all();
        return PostResource::collection($clients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
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
        $client->update($request->all());

        return new PostResource($client);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Client $client
     * @return \Illuminate\\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return response(null, 204);
    }
}
