<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Type;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $clients = Client::all();
            return view('clients.index',['clients' => $clients]); // clients/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $select_values = Company::all();

        // for ($i = 1; $i <= 250; $i++) {
        //     $select_values[]= $i; 
        // }

        return view('clients.create', ['select_values' => $select_values]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
            $client = new Client;
            $client->name = $request->client_name;
            $client->surename = $request->client_surename;
            $client->username = $request->client_username;
            $client->company_id = $request->client_company_id;
            $client->image_url = "#";
                       
            $client->save();
            //echo '<pre>';
            //print_r($request->client_username);
            return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        
        return view('clients.show',['client'=>$client]);       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $select_values = Company::all();
        return view('clients.edit',['client' => $client, 'select_values' => $select_values]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->name = $request->client_name;
        $client->surename = $request->client_surename;
        $client->username = $request->client_username;
        $client->company_id = $request->client_company_id;
        $client->image_url = "#";
                   
        $client->save();
        //echo '<pre>';
        //print_r($request->client_username);
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index');
    }
}
